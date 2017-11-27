#!/usr/bin/python
from package.connect import Connection
import commands as cmd
import os
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

form=cgi.FieldStorage()
# name=form.getvalue('name')
# pltid=form.getvalue('pltID')
contName=form.getvalue('operation')




#removing from database
db=Connection.getDB()
cusr=db.cursor()
cusr.execute("select ContID from Containers where ContName='{0}'".format(contName))
contID=cusr.fetchall()[0][0]
cusr.execute("delete from PAASUsers where ContID='{0}'".format(contID))
cusr.execute("delete from Containers where ContID='{0}'".format(contID))

#Deleting Directory
os.system("rm -R -f /PAAS/{0}".format(contName))


# Deleting Container
delState=cmd.getstatusoutput("sshpass -p root ssh -o StrictHostKeyChecking=No root@server 'docker rm -f {0}' ".format(contName))



if(delState[0]==0 or delState[0]==256):
    db.commit()
    print """
<script type='text/javascript'>alert('Project deleted');
window.location.href='/final/pages/paas.php'</script>
"""
else:
    print """
<script type='text/javascript'>alert('Sorry coud not delete project.');
window.location.href='/final/pages/paas.php'</script>
"""
    