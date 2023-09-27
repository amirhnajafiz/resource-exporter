# Pods Watcher

![GitHub release (with filter)](https://img.shields.io/github/v/release/amirhnajafiz/cloud-watcher)
![Platform](https://img.shields.io/badge/platform-kubernetes-blue)
![Type](https://img.shields.io/badge/type-controller-blue)

A kubernetes controller for monitoring kubernetes cluster resources and send notifications/alerts
on events. This system gets a set of rules as an input, after that it surveillance your cluster
and it sends notifications via email if any violations occurred.

## :eye_speech_bubble: schema

Here is the state machine of our system.

```txt
Kubernetes cluster -> Pods -> Resources -> Check rules -> Rules violation -> Send email
```

## :luggage: configs

Create a ```config.yml``` file based on ```config.example.yml``` template.

```yaml
mailgun:
  sender: "pods-watcher.monitoring.snapp.ir"
  receiver: "main.sre.team.snapp.ir"
  subject: "pods-watcher-violation-email"
  domain: "<mailgun.domain>"
  key: "<mailgun.private_key>"
rules:
  - name: "nginx apps"
    cpu: 10
    ram: 10
    labels:
      app: nginx

```

## :man_pilot: deploy

In order to make a deployment of this controller run ```make``` command.
