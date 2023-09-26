package mail

type Config struct {
	Sender   string `koanf:"sender"`
	Receiver string `koanf:"receiver"`
	Subject  string `koanf:"subject"`
	Domain   string `koanf:"domain"`
	Key      string `koanf:"key"`
}
