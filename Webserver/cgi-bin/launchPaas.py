#!/usr/bin/python
from package.connect import Connection
import commands as cmd
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

form=cgi.FieldStorage()
# name=form.getvalue('name')
# pltid=form.getvalue('pltID')
username=form.getvalue('username')
projectName=form.getvalue('projectName')
pltid=form.getvalue('PltID')

ContName = username+'_'+projectName
cusr=Connection.connect()

if(type(cusr)==int):
    print "Could not establish the connection"

print pltid
cusr.execute("select Name from Paltforms where PltID='{0}'".format(pltid))

img=cusr.fetchall()[0][0]

db=Connection.getDB()
crsr=db.cursor()
crsr.execute("select max(port) from Containers")
port=crsr.fetchall()[0][0]+1

#Creating Directory
dirState=cmd.getstatusoutput("sshpass -p root ssh -o StrictHostKeyChecking=No root@server 'mkdir /PAAS/{0}' ".format(ContName))
dirState=cmd.getstatusoutput("sshpass -p root ssh -o StrictHostKeyChecking=No root@server 'chmod 777 /PAAS/{0}' ".format(ContName))
#Launching docker Container
contState=cmd.getstatusoutput("sshpass -p root ssh -o StrictHostKeyChecking=No root@server 'docker run -d -v {3}:/app -p {2}:80 --name={0} {1}'".format(ContName,img,port,"/PAAS/"+ContName))



if(contState[0]==0):
    getID=cmd.getstatusoutput("sshpass -p root ssh -o StrictHostKeyChecking=No root@server 'docker  inspect  {0} | jq .[].Id'".format(ContName))
    ContID=getID[1][-65:-1]
    crsr.execute("INSERT INTO Containers(ContID,ContName,PltID,port,status) VALUES ('{0}', '{1}', '{2}', '{3}', '1')".format(ContID,ContName,pltid,port))
    crsr.execute("INSERT INTO PAASUsers values('{0}','{1}')".format(username,ContID))
    db.commit()
    print "Platform launched Successfully on port number {0}".format(port)
else:
    print contState[1]

print "<script type='text/javascript'>window.location.href='/final/pages/paas.php'</script>"