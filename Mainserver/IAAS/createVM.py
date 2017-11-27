from lxml.builder import E
from lxml.etree import tostring
import libvirt as v
import sys
import os

name = str(sys.argv[1])
uuid = str(sys.argv[2])
macid = str(sys.argv[3])
cpu = str(sys.argv[4])
mem = str(sys.argv[5])

path = "/var/lib/libvirt/images/{0}.qcow2".format(name)
os.system("cp /var/lib/libvirt/CentOS-7-x86_64-GenericCloud-1503.qcow2 {0}".format(path))

var=tostring(E.domain(
        E.name(name),
        E.uuid(uuid),
        E.memory(mem),
        E.currentMemory(mem),
        E.vcpu(cpu),
        E.os(
            E.type('hvm',arch='x86_64',machine='pc'),
            E.boot(dev='cdrom')
        ),
        E.features(
            E.acpi(),
            E.apic(),
            E.pae()
        ),
        E.clock(offset='localtime'),
        E.on_poweroff('preserve'),
        E.on_reboot('restart'),
        E.on_crash('restart'),
        E.devices(
            E.emulator('/usr/libexec/qemu-kvm'),
            E.disk(
                E.driver(name='qemu',type='qcow2',queues='4'),
                E.source(file=path),
                E.target(dev='hda',bus='ide'),
                type='file',device='disk'
            ),
            E.interface(
                E.mac(address=macid),
                E.source(dev='em1',mode='bridge'),
                E.model(type='virtio'),
                E.driver(name='vhost'),
                type='direct'
            ),
            E.channel(
                E.source(mode='bind',path='/var/lib/libvirt/qemu/rhel6.agent'),
                E.target(type='virtio',name='org.qemu.guest_agent.0'),
                type='unix'
            ),
            E.input(type='mouse',bus='ps2'),
            E.graphics(type='vnc',port='-1',autoport='yes',keymap='en-us')
        ),
        type='kvm'
    )
)

xmlconfig = var

n = v.open("qemu:///system")

dom = n.defineXML(xmlconfig)

dom.create()

print("Guest "+dom.name()+' has booted')