#!/bin/sh

echo "Puchando atualizações..."
git pull
echo "Buildando..."
docker compose -f docker-compose-prod.yml build --no-cache
echo "Removendo container"
docker compose -f docker-compose-prod.yml down
echo "Subindo..."
docker compose -f docker-compose-prod.yml up -d
echo "Atualizando Dependências"
docker exec ea_prod composer install
docker exec ea_prod composer update
echo "Php Artisan"
docker exec ea_prod php artisan cache:clear
docker exec ea_prod php artisan view:clear
docker exec ea_prod php artisan migrate
docker exec ea_prod php artisan db:seed
docker exec ea_prod npm install
docker exec ea_prod npm run build






