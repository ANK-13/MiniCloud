docker start $(docker ps -a | awk {'print $1'})
