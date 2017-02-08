#!/usr/bin/env bash

	echo "==========================================================================="
	echo " "
	echo " "
    # update / upgrade
    sudo apt-get update
    sudo apt-get -y upgrade

    # install apache 2.5 and php 7
    sudo apt-get install -y apache2

    sudo apt-get install software-properties-common
    sudo add-apt-repository ppa:ondrej/php

    sudo apt-get update

	echo " "
	echo " "
	echo "==========================================================================="
	echo "================= End INSTALL-php_mods.SH $(date +"%r") ================="