#!/bin/bash

echo -e "\nThis script will set the environment for tryVisualization \n"
echo -e "\nCheck if installed : \n"
echo -e "\tphp5-gd library"
echo -e "\tphp5-json library"
echo -e "\tfirefox"
echo -e "\nWill be downloaded : \n"
echo -e "\tcomposer.phar"
echo -e "\nWill be executed : \n"
echo -e "\tcomposer install\n"

echo "Press enter to proceed :"
read -r nop

stop_install=false

echo "Check of Php GD"
result=$(dpkg -s php5-gd | grep Status)
echo $result
if [ "$result" != "Status: install ok installed" ] ; 
	then 
		echo "Please install php5-gd"
		echo "eg: sudo apt-get install php5-gd"
		stop_install=true
fi

echo -e "\nCheck of Php json"
result=$(dpkg -s php5-json | grep Status)
echo $result
if [ "$result" != "Status: install ok installed" ] ; 
	then 
		echo "Please install php5-json"
		echo "eg: sudo apt-get install php5-json"
		stop_install=true
fi

echo -e "\nCheck of Firefox"
result=$(dpkg -s firefox | grep Status)
echo $result
if [ "$result" != "Status: install ok installed" ] ; 
	then 
		echo "Please install firefox"
		echo "eg: sudo apt-get install firefox"
		echo -e "Or change the tryVisualization script to use your favourit browser\n"
		stop_install=true
fi

if $stop_install ; then
    exit
fi

echo -e "\nDownload of Composer"
curl -sS https://getcomposer.org/installer | php
echo -e "\nExecution of Composer install"
php composer.phar install

echo -e "\nEverything is installed."
echo -e "Try visualization: php tryVisualization.php \"[REGEX]\"\n"
