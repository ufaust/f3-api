# Simple install guide

### Requirements:
Docker and Docker compose 3.9 or higher

### Commands to run project
- `docker-compose build`
- `docker exec -it f3_api.php composer install`
- `docker-compose up -d`
***
### Initialize database

#### Default server address `http://localhost:8080`
***

***
### Loading fixtures
`php bin/console doctrine:fixtures:load`