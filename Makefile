init:docker-build-up composer-install yarn-install dbal app docker-permission migration seeder

app:env key

env:
	docker-compose run --rm php-cli cp .env.example .env

key:
	docker-compose run --rm php-cli php artisan key:generate

docker-build-up:
	docker-compose up --build -d

composer-install:
	docker-compose run --rm php-cli composer install

composer-update:
	docker-compose run --rm php-cli composer update

yarn-install:
	docker-compose run --rm node yarn install

dbal:
	docker-compose run --rm php-cli composer require doctrine/dbal

migration:
	docker-compose run --rm php-cli php artisan migrate

seeder:
	docker-compose run --rm php-cli php artisan db:seed

seeder-fresh:
	docker-compose run --rm php-cli php artisan migrate:fresh --seed

unban:
	docker-compose run --rm php-cli php artisan ban:delete-expired

docker-down:
	docker-compose down

docker-up:
	docker-compose up -d

docker-restart:docker-down docker-up

docker-permission:
	docker-compose run --rm php-cli chmod -R 777 storage

artisan-migrate:
	docker-compose run --rm php-cli php artisan migrate
