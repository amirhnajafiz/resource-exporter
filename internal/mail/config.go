package mail

type Config struct {
	Domain string `koanf:"domain"`
	Key    string `koanf:"key"`
}
