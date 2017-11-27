#!/usr/bin/python
from package.connect import Connection
import commands as cmd
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

form=cgi.FieldStorage()
name=form.getvalue('name')
pltid=form.getvalue('pltID')
cusr=Connection.connect()

print pltid
cusr.execute("select Name from Paltforms where PltID='{0}'".format(pltid))

img=cusr.fetchall()[0][0]

db=Connection.getDB()
crsr=db.cursor()
crsr.execute("select max(port) from Containers")
port=crsr.fetchall()[0]

print port

#contState=cmd.getstatusoutput("sshpass -p root ssh -o StrictHostKeyChecking=No root@server 'docker run -d -p 1234:80 --name={0} {1}'".format(name,img))

# if(contState[0]==0):
#     cusr.execute("INSERT INTO 'WebServices'.'Containers' ('ContID', 'ContName', 'PltID', 'port', 'status') VALUES ('{0}', '{1}', '{2}', '{3}', '{4}')".format(ContID,name,pltid,port,1))
#     print "Platform launched Successfully"
# else:
#     print contState[1]