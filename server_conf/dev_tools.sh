#!/usr/bin/env bash

	echo "================= START INSTALL-dev_tools.SH $(date +"%r") ================="
	echo "============================================================================"
	echo " "
	echo " "

    # variables
    $PROJECTNAME='wp_site'
    PROJECTFOLDER='./wp'
    WPUSER='root'

    # create project folder
    sudo chmod -R 755 /var/www
    sudo mkdir "/var/www/$PROJECTNAME"

    # setup hosts file
    VHOST=$(cat <<EOF
    <VirtualHost *:80>
        ServerName $PROJECTNAME.dev
        DocumentRoot /var/www/$PROJECTNAME/wp
        ErrorLog /var/www/$PROJECTNAME/logs/apache.error.log
        CustomLog /var/www/$PROJECTNAME/logs/apache.access.log common
        php_flag log_errors on
        php_flag display_errors on
        php_value error_reporting 2147483647
        php_value error_log /var/www/$PROJECTNAME/logs/php.error.log
       <Directory "/var/www/$PROJECTNAME/wp">
            AllowOverride All
            Require all granted
       </Directory>
    </VirtualHost>
    EOF
    )
    echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

    sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/$PROJECTNAME.conf

    echo "${VHOST}" | sudo tee /etc/apache2/sites-available/$PROJECTNAME.conf

    sudo a2ensite $PROJECTNAME.conf

    # enable mod_rewrite
    sudo a2enmod rewrite

	echo " "
	echo " "
	echo "==========================================================================="
	echo "================= End INSTALL-dev_tools.SH $(date +"%r") ================="
