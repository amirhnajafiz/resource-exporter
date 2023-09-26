/*
Copyright 2023.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/

package controllers

import (
	"context"
	"fmt"
	"math"

	"github.com/amirhnajafiz/pods-watcher/internal/config"
	"github.com/amirhnajafiz/pods-watcher/internal/mail"

	corev1 "k8s.io/api/core/v1"
	"k8s.io/apimachinery/pkg/runtime"
	ctrl "sigs.k8s.io/controller-runtime"
	"sigs.k8s.io/controller-runtime/pkg/client"
	"sigs.k8s.io/controller-runtime/pkg/log"
)

// PodReconciler reconciles a Pod object
type PodReconciler struct {
	client.Client
	Scheme    *runtime.Scheme
	Config    config.Config
	MailAgent mail.Agent
}

//+kubebuilder:rbac:groups=core,resources=pods,verbs=get;list;watch;create;update;patch;delete
//+kubebuilder:rbac:groups=core,resources=pods/status,verbs=get;update;patch
//+kubebuilder:rbac:groups=core,resources=pods/finalizers,verbs=update

// Reconcile is part of the main kubernetes reconciliation loop which aims to
// move the current state of the cluster closer to the desired state.
// the Pod object against the actual cluster state, and then
// perform operations to make the cluster state reflect the state specified by
// the user.
//
// For more details, check Reconcile and its Result here:
// - https://pkg.go.dev/sigs.k8s.io/controller-runtime@v0.14.1/pkg/reconcile
func (r *PodReconciler) Reconcile(ctx context.Context, req ctrl.Request) (ctrl.Result, error) {
	logger := log.FromContext(ctx)

	logger.Info(fmt.Sprintf("new pod request:\n\t%s", req.String()))

	// get requested pod
	var pod corev1.Pod
	if err := r.Get(ctx, req.NamespacedName, &pod); err != nil {
		logger.Error(err, fmt.Sprintf("failed to get pod instance:\n\t%s", req.NamespacedName))

		return ctrl.Result{}, err
	}

	// if pod is not running then ignore it
	if pod.Status.Phase == corev1.PodFailed {
		return ctrl.Result{}, nil
	}

	// set defaults
	var (
		cpuLimit float64
		ramLimit float64
	)

	// check in rules
	for _, rule := range r.Config.Rules {
		// if no labels are set, then it's global
		if len(rule.Labels) == 0 {
			cpuLimit = rule.CPU
			ramLimit = rule.RAM

			continue
		}

		// check labels match
		for key := range rule.Labels {
			if value, ok := pod.Labels[key]; ok && value == rule.Labels[key] {
				// set to maximum of previous value and new value
				cpuLimit = math.Max(rule.CPU, cpuLimit)
				ramLimit = math.Max(rule.RAM, ramLimit)
			}
		}
	}

	// check requested resources
	for _, container := range pod.Spec.Containers {
		// get current resources
		cpu := float64(container.Resources.Limits.Cpu().Value())
		ram := float64(container.Resources.Limits.Memory().Value())

		// check with rules
		if cpu > cpuLimit || ram > ramLimit {
			// send email in case of violation
			if er := r.MailAgent.Send(
				req.NamespacedName.String(),
				req.Namespace,
				cpuLimit,
				ramLimit,
				cpu,
				ram,
			); er != nil {
				logger.Error(er, fmt.Sprintf("failed to send violation email:\n\t%s", req.String()))
			}
		}
	}

	return ctrl.Result{}, nil
}

// SetupWithManager sets up the controller with the Manager.
func (r *PodReconciler) SetupWithManager(mgr ctrl.Manager) error {
	return ctrl.NewControllerManagedBy(mgr).
		For(&corev1.Pod{}).
		Complete(r)
}
