# StationFive
StationFive Backend Technical Exam

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

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

There are sample SQL dump inside the `databse` directory that are prefilled with `context` data and `message` data.

## Key directory/files to look for.
Controllers, Validation, Rules and Actions:

https://github.com/ronssij/messaging/tree/master/app/Actions
https://github.com/ronssij/messaging/blob/master/app/Rules/InContext.php
https://github.com/ronssij/messaging/blob/master/app/Http/Controllers/MessageController.php
https://github.com/ronssij/messaging/blob/master/app/Http/Requests/MessageRequest.php

Resources:

https://github.com/ronssij/messaging/blob/master/app/Http/Resources/ContextMessageResource.php
https://github.com/ronssij/messaging/blob/master/app/Http/Resources/MessageResource.php

Models:

https://github.com/ronssij/messaging/blob/master/app/Models/Context.php
https://github.com/ronssij/messaging/blob/master/app/Models/Conversation.php
https://github.com/ronssij/messaging/blob/master/app/Models/Message.php

Database schema, seeder and sample files to seed:

2022_06_13_052946_create_contexts_table.php
https://github.com/ronssij/messaging/blob/master/database/migrations/2022_06_13_053256_create_messages_table.php
https://github.com/ronssij/messaging/blob/master/database/seeders/DatabaseSeeder.php
https://github.com/ronssij/messaging/blob/master/resources/json/contexts.json

Unit testing:

https://github.com/ronssij/messaging/blob/master/tests/Feature/Message/StoreTest.php

## Testing
For testing, Configuration can be found in `.env.testing`
* To run the test, run this on your terminal `vendor/bin/phpunit` or `php artisan test`
