#!/bin/bash/
php artisan view:clear;
php artisan cache:clear;
php artisan route:cache;
php artisan config:cache;
php artisan config:clear;
php artisan serve --port 8001;
