install:
	docker exec -it f3-api.php composer install
	cp docker/php/.env.dev.dist docker/php/.env
	cp docker/php/.env.dev.dist .env
start:
	docker compose up -d --build --remove-orphans
build:
	docker compose build
stop:
	docker compose down -v
fix-rights:
	docker exec -it f3-api.php chown -R www-data:www-data /var/www/f3-api/
	docker exec -it f3-api.db chown -R postgres /var/lib/postgresql/
migrate:
	docker exec -it f3-api.php php bin/console doctrine:migrations:migrate
jwt:
	docker exec -it f3-api.php php bin/console lexik:jwt:generate-keypair