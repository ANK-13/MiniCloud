#!/usr/bin/python
import os
import sys

os.system(""" echo "apache" | sudo -S useradd {0}""".format(sys.argv[1]))
#os.system(""" echo "apache\n{0}\n{0}" | sudo -S useradd {0}""".format(sys.argv[2]))
