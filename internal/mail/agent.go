package mail

import (
	"context"
	"fmt"

	"github.com/mailgun/mailgun-go/v4"
)

type Agent interface {
	Send(name, namespace string, cpuLimit, ramLimit, cpu, ram float64) error
}

func New(cfg Config) Agent {
	conn := mailgun.NewMailgun(cfg.Domain, cfg.Key)

	return &agent{
		cfg:        cfg,
		connection: conn,
	}
}

type agent struct {
	connection *mailgun.MailgunImpl
	cfg        Config
}

func (a agent) Send(name, namespace string, cpuLimit, ramLimit, cpu, ram float64) error {
	ctx := context.Background()

	body := fmt.Sprintf(
		"Pod `%s` in namespace `%s` is violating %f CPU and %f RAM limits by using %f CPU and %f RAM.",
		name,
		namespace,
		cpuLimit,
		ramLimit,
		cpu,
		ram,
	)

	// create new message
	message := a.connection.NewMessage(a.cfg.Sender, a.cfg.Subject, body, a.cfg.Receiver)

	// send the message with a 10 seconds timeout
	_, _, err := a.connection.Send(ctx, message)
	if err != nil {
		return fmt.Errorf("failed to send email: error=%w", err)
	}

	return nil
}
