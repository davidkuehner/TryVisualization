#!/bin/bash

echo -e "\nThis script will set the environment for tryVisualization \n"
echo -e "\nWill be installed : \n"
echo -e "\tphp5-gd library"
echo -e "\tfirefox library"
echo -e "\nWill be downloaded : \n"
echo -e "\tcomposer.phar"
echo -e "\nWill be executed : \n"
echo -e "\tcomposer install\n"

echo "Press enter to proceed :"
read -r nop

echo "Installation of php GD"
sudo apt-get install php5-gd
echo -e "\nInstallation of Firefox"
sudo apt-get install firefox
echo -e "\nDownload of Composer"
curl -sS https://getcomposer.org/installer | php
echo -e "\nExecution of Composer install"
php composer.phar install

echo -e "\nEverything is installed."
echo -e "Try visualization: php tryVisualization.php \"[REGEX]\"\n"
