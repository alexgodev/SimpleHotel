PHP version > 7.2 is required

To install locally:

Change .env file according to your local settings

run these commands

- composer install
- npm install browser-sync browser-sync-webpack-plugin bootstrap@^4.4.1 jquery@^3.4.1 jquery-scroll-lock@^3.1.3 jquery.appear@^1.0.1 js-cookie@^2.2.1 popper.js@^1.16.1 simplebar@^5.1.0 --save-dev
- php artisan migrate:fresh --seed
- php artisan serve



