# Mini CRM Doo

# How to setup project

## Pre-installed(Need to have)

-   PHP (8.2.24)
-   Composer (2.4.0)
-   Node.js (18.8.0)

## Instructions

1. Clone the repository via ssh:

    git clone git@github.com:angelos-l/mini-crm-doo.git
    cd mini-crm-doo

2. Install dependencies:

    composer install
    npm install

3. Set up .env file:

    Configure .env file with database details(.env.example as a guide)

4. Run migrations and seeders:

    php artisan migrate
    php artisan db:seed --class=AdminSeeder
    php artisan db:seed --class=DatabaseSeeder

5. Create Storage link

    php artisan storage:link

6. Compile assets:

    npm run build

7. Run server:

    php artisan serve
