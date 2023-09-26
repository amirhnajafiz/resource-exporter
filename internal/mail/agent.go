package mail

import (
	"github.com/mailgun/mailgun-go/v4"
)

type Agent interface {
	Send(name, namespace string, rules []string, cpuLimit, ramLimit, cpu, ram float64) error
}

func New(cfg Config) Agent {
	conn := mailgun.NewMailgun(cfg.Domain, cfg.Key)

	return &agent{
		connection: conn,
	}
}

type agent struct {
	connection *mailgun.MailgunImpl
}

func (a agent) Send(name, namespace string, rules []string, cpuLimit, ramLimit, cpu, ram float64) error {
	return nil
}
