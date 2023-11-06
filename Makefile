install:
	docker exec -it f3-api.php composer install
	cp docker/php/.env.dev.dist docker/php/.env
	docker exec -it f3-api.php php bin/console doctrine:database:create
	docker exec -it f3-api.php php bin/console doctrine:migrations:migrate
start:
	docker compose up -d --build --remove-orphans
build:
	docker compose -p passwork build --no-cache