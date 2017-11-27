#!/usr/bin/python

import cgi,cgitb

print "Content-Type: text/html; charset=UTF-8;"
print ""

instDetails=cgi.FieldStorage()

cpu = instDetails.getvalue('cpu')

print cpu

