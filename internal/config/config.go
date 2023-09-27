package config

import (
	"log"

	"github.com/amirhnajafiz/pods-watcher/internal/mail"

	"github.com/knadh/koanf"
	"github.com/knadh/koanf/parsers/yaml"
	"github.com/knadh/koanf/providers/file"
	"github.com/knadh/koanf/providers/structs"
)

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

func Load() Config {
	var instance Config

	k := koanf.New(".")

	// load default configuration from file
	if err := k.Load(structs.Provider(Default(), "koanf"), nil); err != nil {
		log.Fatalf("error loading default: %s", err)
	}

	// load configuration from file
	if err := k.Load(file.Provider("config.yml"), yaml.Parser()); err != nil {
		log.Printf("error loading config.yml: %s", err)
	}

	if err := k.Unmarshal("", &instance); err != nil {
		log.Fatalf("error unmarshalling config: %s", err)
	}

	return instance
}
