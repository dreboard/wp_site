#!/usr/bin/env bash

	echo "================= Start INSTALL-complete.SH $(date +"%r") ================="
	echo "==========================================================================="
	echo " "
	echo " "
	
	#sudo yum -y install nano

    # install git
    sudo apt-get -y install git

    #wp cli
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    chmod +x wp-cli.phar
    sudo mv wp-cli.phar /usr/local/bin/wp

    # install Composer
    curl -s https://getcomposer.org/installer | php
    mv composer.phar /usr/local/bin/composer

    # Adding NodeJS from Nodesource. This will Install NodeJS Version 5 and npm
    sudo apt-add-repository ppa:chris-lea/node.js
    sudo apt-get update
    sudo apt-get install -y nodejs

    # Installing Bower and Gulp
    sudo npm install -g bower gulp

    # restart apache
    service apache2 restart

	echo " "
	echo " "
	echo "==========================================================================="
	echo "================= End INSTALL-complete.SH $(date +"%r") ================="