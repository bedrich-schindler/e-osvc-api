# e-OSVČ API

API for e-OSVČ application.

## Installation

1. Start Docker container:  `docker-compose up` or `./docker-compose-sync.sh start` (if `docker-sync` is installed)
2. Connect to Docker container `docker exec -it e-osvc-api_web_1 bash`
3. Install dependencies `composer install`
4. Create database `bin/console doctrine:database:create`
5. Run database migrations `bin/console doctrine:migrations:migrate`
6. Generate JWT certificates: `sh generateJwtCerts.sh

### docker-sync support

If you use Windows or MacOS, try to use `docker-sync` for much faster performance.

To install `docker-sync`, follow instruction on official website http://docker-sync.io


