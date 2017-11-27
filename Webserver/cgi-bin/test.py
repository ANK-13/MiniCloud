#!/usr/bin/python
import uuid
from random import randint
import os
from package.connect import Connection
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

cr=Connection.connect()
