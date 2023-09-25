package mail

type Agent interface {
	Send(name, namespace string, rules []string, cpuLimit, ramLimit, cpu, ram float64) error
}
