#!/bin/bash

docker exec -it -w /var/www/html/php meetup_phpfpm phpunit --coverage-html coverage --whitelist ./src