#!/usr/bin/env bash

# Use single quotes instead of double quotes to make it work with special-character passwords
# variables
DBNAME='wordpress'
PASSWORD='1234'
PROJECTFOLDER='./wp'
WPUSER='root'

# create project folder
sudo mkdir "/var/www/html/${PROJECTFOLDER}"

# update / upgrade
sudo apt-get update
sudo apt-get -y upgrade

# install apache 2.5 and php 7
sudo apt-get install -y apache2

sudo apt-get install software-properties-common
sudo add-apt-repository ppa:ondrej/php

sudo apt-get update &&
sudo apt-get install php7.0-fpm php7.0-cli php7.0-common php7.0-json php7.0-opcache php7.0-mysql php7.0-phpdbg php7.0-mbstring php7.0-gd php7.0-imap php7.0-ldap php7.0-pgsql php7.0-pspell php7.0-recode php7.0-snmp php7.0-tidy php7.0-dev php7.0-intl php7.0-gd php7.0-curl php7.0-zip php7.0-xml php7.0-curl php7.0-json php7.0-mcrypt

# install xdebug and config
sudo apt-get install php-xdebug
cat << EOF | sudo tee -a /etc/php5/mods-available/xdebug.ini
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF

# PHP Config
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini

# install mysql and give password to installer
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get -y install mysql-server

# install phpmyadmin and give password(s) to installer
# for simplicity I'm using the same password for mysql and phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get -y install phpmyadmin

#mysql -u root -p $PASSWORD create database wordpress

# look to see if the database is installed yet
RESULT=`mysqlshow --user=$WPUSER $DBNAME | grep -v Wildcard | grep -o $DBNAME`

if [ "$RESULT" == $DBNAME ]
  # if it's already installed, just indicate such
  then
    echo 'Database already installed.'

  # if it's not installed, install it using the daptive_dma profile
  else
    echo "$RESULT - $DBNAME"
    echo "Database $DBNAME not yet installed... installing using mysql"

    mysql -u $WPUSER -e "CREATE DATABASE IF NOT EXISTS $DBNAME;"

    # not using drush anymore for this
    echo "Database $DBNAME should be installed, drop then run this script again to reinstall."
fi

# setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot "/var/www/html/${PROJECTFOLDER}"
    ServerName wp_site.dev
    <Directory "/var/www/html/${PROJECTFOLDER}">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

echo "${VHOST}" | sudo tee /etc/apache2/sites-available/wp_site.dev

sudo a2ensite wp_site.dev

# enable mod_rewrite
sudo a2enmod rewrite

# install git
#sudo apt-get -y install git

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