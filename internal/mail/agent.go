package mail

type Agent interface {
	Send(name, namespace, rule string, cpuLimit, ramLimit, cpu, ram float64) error
}
