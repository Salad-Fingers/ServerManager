#!/bin/bash

#########################
##  Script created by  ##
##   Csendes Marcell   ##
#########################

ADMIN_1_FILE="https://www.dropbox.com/s/nyqakfbbt90hc1w/admin1.zip?dl=0"

if [ $1 ]
then
case $1 in
esac
		mkdir "/home/client$1/tmp"
		chmod 777 "/home/client$1/tmp"
		apt-get install lua5.1 -y > /dev/null
		wget -q $ADMIN_1_FILE -O "/home/client$1/tmp/admin1.zip"
		unzip "/home/client$1/tmp/admin1.zip" -d "/home/client$1/tmp" > /dev/null
		rm "/home/client$1/tmp/admin1.zip"
		cp -r "/home/client$1/tmp/"* "/home/client$1/"
		rm -r "/home/client$1/tmp"
		sed -i 's/Adminlist = {xxxxx}/Adminlist = {6943}/g' "/home/client$1/sys/lua/server.lua"
		sed -i 's/local xxxxx="xxxxx"/--/g' "/home/client$1/sys/lua/server.lua"
	echo "<button class='btn btn-block btn-success btn-xs'>Script has been installed and configured well!</button> <br />"
else 
	echo "<button class='btn btn-block btn-danger btn-xs'>Something bad happened!</button><meta http-equiv='refresh' content='3; url=servers.php' /><br />"
fi
