#!/bin/bash
cd "$(dirname "$0")"
composer install
npm install
cp .env.example .env
php artisan key:generate
cd database
touch database.sqlite
cd ..
php artisan migrate:fresh --seed
php artisan storage:link