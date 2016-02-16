#!/bin/bash

#########################
##  Script created by  ##
##   Csendes Marcell   ##
#########################

MASTERSERVER="https://www.dropbox.com/s/mgysd0gy86l8y5x/masterserver.zip?dl=0"á
	chmod 777 "home"
	wget -q $MASTERSERVER -O "/home/masterserver.zip"
	unzip "/home/masterserver.zip" -d "/home/" > /dev/null
	rm "/home/masterserver.zip"
	chmod 755 "/home/masterserver/cs2d_dedicated"
	chmod 755 "/home"
	echo "<button class='btn btn-block btn-success btn-xs'>Masterserver installed!</button><meta http-equiv='refresh' content='3; url=servers.php' /><br />"
