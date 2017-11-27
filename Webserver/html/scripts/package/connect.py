#!/usr/bin/env python
import MySQLdb as sql
import sys

class Connection:
    'Class for establising connection with VD WebServices'
    def __init__(self):
        pass
    @staticmethod
    def connect():
        try:
            db=Connection.getDB()
            crsr=db.cursor()
            sys.stdout.write("Connection Established\n")
        except:
            sys.stdout.write("Sorry, Could not connect to Database\n")
        return crsr

    @staticmethod
    def getDB():
        return sql.connect("10.7.3.56","web","web","WebServices")



class SAAS:
    def __init__(self):
        pass

    @staticmethod
    def getIP(uname,passwd):
        c=Connection.connect()
        c.execute("SELECT Username from Identity where Username='"+uname+"' and Password='"+passwd+"';")
        if(len(c.fetchall())==1):
            sys.stdout.write("User has been varified\n")
            c.execute("SELECT IP from SAAS where Username='"+uname+"';")
            tmp=c.fetchall()
            return tmp[0][0]
        else:
            sys.stderr.write("Could not verify the user\n")
            return -1
