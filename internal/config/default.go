package config

import "github.com/amirhnajafiz/pods-watcher/internal/mail"

func Default() Config {
	return Config{
		Mailgun: mail.Config{},
		Rules:   []Rule{},
	}
}
