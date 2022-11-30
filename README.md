# Stack
- PHP 8.1
- Laravel 9
- Vue 3
- InertiaJs

# Deployment
The application is deployed on AWS lambda using [laravel vapor](https://vapor.laravel.com/), the database is a serverless v2 mysql database from AWS RDS
# Dev Requirements
- Docker (latest)
- Docker Compose (latest)
- Make sure that ports (app: 8000, mysql: 3306) are not used on your host machine cause they are used by the app docker-compose file these ports exposes the services that you will need while development

# Dev Run
We are using [laravel/sail](https://laravel.com/docs/9.x/sail) for the development environment, just follow these steps to start the application.

- `cp .env.example .env` then fill the required data
- `docker-compose run --rm --user=$(id -u) composer install --ignore-platform-reqs`
- `docker-compose run --rm --user=$(id -u) php artisan key:generate`
- `./vendor/bin/sail up -d` then wait for 10 seconds till mysql container finish initialization
- `./vendor/bin/sail artisan migrate:fresh --seed`

# Code Style
For code styling and formatting we are using https://laravel.com/docs/9.x/pint which is very popular and being used by the laravel core team.
