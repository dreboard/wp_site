# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.box = "ubuntu/xenial64"
  config.vm.network "forwarded_port", guest: 80, host: 8092

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "512"
  end

  config.vm.provision "shell", inline: <<-SHELL
    sudo apt-get update
    sudo apt-get -y upgrade
    sudo apt-get install -y openssl
    sudo chmod -R 755 /vagrant

    echo -e "\n------------------------------------------- Installing Apache\n"
    sudo apt-get install -y apache2
    sudo a2enmod rewrite
    sudo cp /vagrant/dev_ops/apache/wp_site.conf /etc/apache2/sites-available/000-default.conf
    sudo cp /vagrant/dev_ops/apache/wp_site.conf /etc/apache2/sites-available
    sudo a2ensite wp_site
    #sudo service apache2 start

    sudo apt-get install software-properties-common
    sudo add-apt-repository ppa:ondrej/php

    sudo apt-get update

    echo -e "\n------------------------------------------- Installing PHP\n"
    sudo apt-get install -y php7.1 php7.1-opcache php7.1-phpdbg php7.1-mbstring php7.1-cli php7.1-imap php7.1-ldap php7.1-pgsql php7.1-pspell php7.1-recode php7.1-snmp php7.1-tidy php7.1-dev php7.1-intl php7.1-gd php7.1-zip php7.1-xml php7.1-curl php7.1-json php7.1-mcrypt
    sudo apt-get install php7.1-intl php7.1-xsl
    sudo apt-get install -y php7.1-mysql

    echo -e "\n------------------------------------------- Installing Xdebug\n"
    sudo apt-get install -y php-xdebug
    sudo cp /vagrant/dev_ops/apache/20-xdebug.ini /etc/php/7.1/cli/conf.d

    # Create folder for profiler
    if [ -d "/vagrant/tmp/profiles" ]; then
        mkdir -p "/vagrant/tmp/profiles"
      else
        rm -rf /vagrant/tmp/profiles/*
    fi

    echo -e "\n------------------------------------------- Installing Extras\n"
    sudo apt-get -y install curl git nano tofrodos
    sudo apt-get install snmp

    sudo apt-get -y install libapache2-mod-php7.1
    sudo apt-get -y autoremove

  SHELL

  config.vm.provision "database", type: "shell", path: "./dev_ops/vagrant_conf/database.sh"

  config.vm.provision "shell", inline: <<-SHELL2
    echo -e "\n------------------------------------------- Composer install and config\n"
    curl -s https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
    cd /vagrant && php composer.phar install
    sudo cp /vagrant/dev_ops/git/post-merge.sh /vagrant/.git/hooks

    echo -e "\n------------------------------------------- Installing Worpress CLI\n"
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    chmod +x wp-cli.phar
    sudo mv wp-cli.phar /usr/local/bin/wp

    echo -e "\n------------------------------------------- Activate Worpress Plugins\n"
    cd /vagrant/wp && wp plugin activate backupwordpress --allow-root
    cd /vagrant/wp && wp plugin activate debug-bar --allow-root
    cd /vagrant/wp && wp plugin activate query-monitor --allow-root
    cd /vagrant/wp && wp plugin activate syntaxhighlighter --allow-root

  SHELL2

  config.vm.provision "bootstrap", type: "shell", path: "./dev_ops/vagrant_conf/run_always.sh", run: "always"

end