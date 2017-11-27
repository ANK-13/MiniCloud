import os

tmp = os.popen("sshpass -p root ssh -o StrictHostKeyChecking=No root@server \"virsh domifaddr Aniket --source agent eth0\"").read()

print tmp