#!/usr/bin/python
from package.connect import Connection
import commands as cmd
import cgi,cgitb
import os
import commands as cmd
import sys
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

instDetails=cgi.FieldStorage()
op=instDetails.getvalue('operation')

cusr=Connection.connect()

if(type(cusr)==int):
    print "Could not establish the connection"

instName = op[:-1]

if(op[len(op)-1:]=='@'):
    instState=cmd.getstatusoutput('sshpass -p root ssh -o StrictHostKeyChecking=No root@server "virsh shutdown {0}"'.format(instName))
    if(instState[0] == 0):
        db=Connection.getDB()
        cusr=db.cursor()
        cusr.execute("update InstDetails set state=0 where name='{0}'".format(instName))
        db.commit()
elif(op[len(op)-1:]=='^'):
    instState=cmd.getstatusoutput('sshpass -p root ssh -o StrictHostKeyChecking=No root@server "virsh start {0}"'.format(instName))
    if(instState[0] == 0):
        db=Connection.getDB()
        cusr=db.cursor()
        cusr.execute("update InstDetails set state=1 where name='{0}'".format(instName))
        db.commit()
elif(op[len(op)-1:]=='$'):
    instState=cmd.getstatusoutput('sshpass -p root ssh -o StrictHostKeyChecking=No root@server "virsh reboot {0}"'.format(instName))
    if(instState[0] == 0):
        db=Connection.getDB()
        cusr=db.cursor()
        cusr.execute("update InstDetails set state=1 where name='{0}'".format(instName))
        db.commit()
elif(op[len(op)-1:]=='&'):
    instState=cmd.getstatusoutput('sshpass -p root ssh -o StrictHostKeyChecking=No root@server "virsh destroy {0}"'.format(instName))
    instState=cmd.getstatusoutput('sshpass -p root ssh -o StrictHostKeyChecking=No root@server "virsh undefine {0}"'.format(instName))
    instState1=cmd.getstatusoutput('sshpass -p root ssh -o StrictHostKeyChecking=No root@server "rm -f /var/lib/libvirt/images/{0}.qcow2"'.format(instName))
    if(instState[0] == 0 and instState1[0]==0):
        db=Connection.getDB()
        cusr=db.cursor()
        cusr.execute("select InstId from InstDetails where name='{0}'".format(instName))
        instid=cusr.fetchall()[0][0]
        cusr.execute("delete from IaasUsers where InstID = '{0}'".format(instid))
        cusr.execute("delete from InstDetails where InstId = '{0}'".format(instid))
        db.commit()
elif (op[-1:]=="*"):
    instState=cmd.getstatusoutput("""sshpass -p root ssh -q -o StrictHostKeyChecking=No root@server "virsh domifaddr %s --source agent eth0" | awk '/eth0/ {print $4}' """ % instName)
    print """
    <script type='text/javascript'>alert('IP address: {0}'); window.location.href='/final/pages/iaas.php'</script>""".format(instState[1][:-3])

    



print "<script type='text/javascript'>window.location.href='/final/pages/iaas.php'</script>"