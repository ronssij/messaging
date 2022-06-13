# StationFive
StationFive Backend Technical Exam

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

## Laravel Version
Laravel 9.17.0

### Installing
A step by step series of examples that tell you how to get a development env running

* Make sure you have composer installed on your local machine `composer install`
* Create .env file from .env.example `cp .env.example .env`
* Update .env based on your local configuration
* Generate application key `php artisan key:generate`
* You can serve the application on LAMP/XAMPP/LEMP stack or use its builtin server `php artisan serve`
* To seed context table data run `php artisan db:seed`


## Testing
For testing, Configuration can be found in `.env.testing`
* To run the test, run this on your terminal `vendor/bin/phpunit` or `php artisa test`
