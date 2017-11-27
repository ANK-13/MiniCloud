#!/usr/bin/python
from package.connect import Connection
import os
import commands as cmd
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

form=cgi.FieldStorage()
user=form.getvalue("username")

db=Connection.getDB()
cusr=db.cursor()
cusr.execute("select Password  from Identity where Username='{0}'".format(user))
passwd = cusr.fetchall()[0][0]

if(passwd==None):
	print "User Does not exists"

userState= cmd.getstatusoutput("python /var/www/cgi-bin/useradd.py {}".format(user))

if(userState[0]==0):
	passState= cmd.getstatusoutput("echo 'apache\n{1}\n{1}' | sudo -S passwd {0}".format(user,passwd))
	msg="Service activated"
	cusr.execute("insert into SAAS(Username) values('{0}')".format(user))
	db.commit()
else:
    msg="Sorry, Could not activate service"

print """
<script type='text/javascript'>alert('{0}');
window.location.href='/final/pages/saas.php'</script>
""".format(msg)