# Initializing the project

## Install dependencies

    composer install
    pnpm install

## Copy .env.example to .env

    cp .env.example .env

## Generate application key

    php artisan key:generate

## Create sqlite db file

cd to project

    cd database
    touch database.sqlite
    cd ..

## Run migrations and storage linking

    php artisan migrate:fresh
    php artisan storage:link

# Run the project

    composer install
    npm install
