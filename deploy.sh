#!/bin/sh
echo "Subindo docker"
docker-compose up -d
echo "Atualizando Dependências"
docker exec ea composer install
docker exec ea composer update
echo "Php Artisan"
docker exec ea php artisan cache:clear
docker exec ea php artisan view:clear
docker exec ea php artisan artisan migrate
docker exec ea npm install
docker exec ea npm run build






