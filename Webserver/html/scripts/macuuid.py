#!/usr/bin/python
from package.connect import Connection
import uuid
from random import randint
import os
import commands as cmd
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

instDetails=cgi.FieldStorage()
name=instDetails.getvalue('nm')
cpu=instDetails.getvalue('cpu')
mem=instDetails.getvalue('memory')



# name = istDetails.getValue('name')
# cpu = instDetails.getvalue('cpu')
# memory = instDetails.getValue('memory')

# name = instDetails.getlist('name')
# cpu = instDetails.getlist('cpu')
# memory = instDetails.getlist('memory')

def genuuid():
    return str(uuid.uuid4())

def randomMAC():
    return [ 0x00, 0x16, 0x3e,
        randint(0x00, 0x7f),
        randint(0x00, 0xff),
        randint(0x00, 0xff) ]

def macid(mac):
    return ':'.join(map(lambda x: "%02x" % x, mac))

uuid=genuuid()
mac=macid(randomMAC())

instState=cmd.getstatusoutput('sshpass -p root ssh -o StrictHostKeyChecking=No root@server "python /root/Documents/IAAS/createVM.py {0} {1} {2} {3} {4}"'.format(name, uuid, mac, cpu, mem))
#print cmd.getstatusoutput("sshpass -p root ssh root@server firefox")
print instState

if(instState[0]==0):
    db=Connection.getDB()
    cusr=db.cursor()
    cusr.execute("insert into InstDetails(name,CPU,Memory,UUID,image,macNo) values('{0}','{1}','{2}','{3}','{4}','{5}')".format(name,cpu,mem,uuid,1,mac))
    db.commit()

print "Worked correctly"