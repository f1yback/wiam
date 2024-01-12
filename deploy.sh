docker-compose up -d --build
docker exec -i wiam-php composer install
docker exec -i wiam-php php yii migrate --interactive=0