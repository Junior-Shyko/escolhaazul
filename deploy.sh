git pull &&
docker-compose up -d &&
docker-compose exec ea composer install &&
docker-compose exec ea composer update &&
docker-compose exec ea php artisan cache:clear &&
docker-compose exec ea php artisan view:clear &&
docker-compose exec ea php artisan migrate &&
rm -R public/build/ &&
docker-compose exec ea npm install &&
docker-compose exec ea npm run build
