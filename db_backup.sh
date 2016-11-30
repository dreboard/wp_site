#!/usr/bin/env bash

mysqldump -u root -p 1234 wordpress > /vagrant/wp_backup.sql
