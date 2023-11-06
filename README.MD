# Simple install guide

### Requirements:
Docker and Docker compose 3.9 or higher

### Commands to build and run project
- `make build`
- `make start`
- `make install` - composer install, create DB and migrations etc.
***
#### Default server address `http://localhost:8080`

***
### Loading fixtures
`php bin/console doctrine:fixtures:load`

***
### Generate JWT Token
`php bin/console lexik:jwt:generate-keypair`  

After generation of JWT token copy `JWT_PASSPHRASE` from `project-root/.env` to `docker/php/.env` 

### Psalm 
`./vendor/bin/psalm`

***
### Api-platform
`your-domain/api`