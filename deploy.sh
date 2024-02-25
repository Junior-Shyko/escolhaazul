docker exec ea composer install
docker exec ea composer update
docker exec ea php artisan cache:clear
docker exec ea php artisan view:clear
docker exec ea php artisan artisan migrate
docker exec ea npm install
docker exec ea npm run build






