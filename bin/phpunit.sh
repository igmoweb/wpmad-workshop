#!/bin/bash

docker exec -it -w /var/www/html/php meetup_phpfpm ./vendor/bin/phpunit-watcher watch