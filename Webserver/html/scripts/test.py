#!/usr/bin/python
import uuid
from random import randint
import os
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

instDetails=cgi.FieldStorage()

print instDetails.getlist('memory')

#name = instDetails.getValue('name')
#cpu = instDetails.getvalue('cpu')
#memory = instDetails.getValue('memory')
#print cpu
#print name
#print memory