#!/bin/bash

composer update

php artisan migrate
php artisan key:generate
php artisan config:cache

php-fpm