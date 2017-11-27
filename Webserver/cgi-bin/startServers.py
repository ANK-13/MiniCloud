#!/usr/bin/python

import os
import commands as cmd 
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""




print cmd.getstatusoutput("""sshpass -p root ssh -o StrictHostKeyChecking=No root@server 'bash /root/Documents/PAAS/startContainers.sh'  """)
