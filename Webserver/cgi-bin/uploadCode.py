#!/usr/bin/python
#from package.connect import Connection
import commands as cmd
import zipfile as zip
import os,zipfile
import cgi,cgitb
cgitb.enable()

print "Content-Type: text/html; charset=UTF-8;"
print ""

form = cgi.FieldStorage()

contName=form.getvalue('contName')
# Get filename here.
fileitem = form['file']

print fileitem.filename
# Test if the file was uploaded
if fileitem.filename:
   # strip leading path from file name to avoid 
   # directory traversal attacks
   fn = os.path.basename(fileitem.filename.replace("\\", "/" ))
   open('/PAAS/'+contName+'/'+ fn, 'wb').write(fileitem.file.read())

   message = 'The file "' + fn + '" was uploaded successfully'
   zip_ref = zipfile.ZipFile('/PAAS/'+contName+'/'+ fn, 'r')
   zip_ref.extractall('/PAAS/'+contName+'/')
   zip_ref.close()
   os.remove('/PAAS/'+contName+'/'+ fn)
else:
   message = 'No file was uploaded'
   
print """
<script type='text/javascript'>alert('{0}');
window.location.href='/final/pages/paas.php'</script>
""".format(message)
