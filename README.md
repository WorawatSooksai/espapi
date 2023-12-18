# README

This README would normally document whatever steps are necessary to get the application up and running.

Things you may want to cover:

## App Info

-check git
git --version
-check composer
composer --version
## Installation on xampp/htdocs

composer create-project leafs/api espapi
cd espapi
-test leaf by
php leaf serve

-see dev server on
(http://localhost:5500)
-or start apache and mysql
http://localhost/espapi/public/
## System dependencies

## Configuration


## Database creation on .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db652021xxx
DB_USERNAME=root
DB_PASSWORD=
DB_CHARSET=utf8
# DB_COLLATION=utf8_unicode_ci
DB_COLLATION=utf8_general_ci


## Database initialization
php leaf g:controller variables -ar
php leaf g:controller logs -ar

->create_variables.php
///
$table->increments('id');
$table->string('name');
$table->string('type');
$table->timestamps();
///
->create_logs.php
///
$table->increments('id');
                $table->integer('variable_id');
                $table->index('variable_id');
                $table->foreign('variable_id')->references('id')->on('variables')->onDelete('cascade');
                $table->integer('v_integer')->nullable();
                $table->double('v_double')->nullable();
                $table->string('v_string')->nullable();
                $table->timestamps();
///
php leaf db:migrate

## Deployment instructions
