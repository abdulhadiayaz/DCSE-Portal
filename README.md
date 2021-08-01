
## DBMS Project

Install all the dependencies:

    composer install

Rename env.example and make sure to setup your db in .env file

After that, run:
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan serve

Short cut commands:

     composer clearcache
     php artisan config:clear
     php artisan key:generate
     php artisan migrate
     php artisan migrate:refresh
     php artisan db:seed
     php artisan serve
     php artisan migrate:refresh
