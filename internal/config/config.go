package config

import "github.com/amirhnajafiz/pods-watcher/internal/mail"

type (
	Rule struct {
		Name   string            `koanf:"name"`
		CPU    float64           `koanf:"cpu"`
		RAM    float64           `koanf:"ram"`
		Labels map[string]string `koanf:"labels"`
	}

	Config struct {
		Mailgun mail.Config `koanf:"mailgun"`
		Rules   []Rule      `koanf:"rules"`
	}
)
