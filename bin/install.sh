#!/bin/bash

docker exec -it --user www-data meetup_phpfpm bash -c 'cd /var/www/html/php ; composer install'