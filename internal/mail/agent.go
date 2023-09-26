package mail

import (
	"github.com/mailgun/mailgun-go/v4"
)

type Agent interface {
	Send(name, namespace string, rules []string, cpuLimit, ramLimit, cpu, ram float64) error
}

type agent struct {
	connection *mailgun.MailgunImpl
}

func New(cfg Config) {
	conn := mailgun.NewMailgun(cfg.Domain, cfg.Key)
}

func (a agent) Send(name, namespace string, rules []string, cpuLimit, ramLimit, cpu, ram float64) error {
	return nil
}
