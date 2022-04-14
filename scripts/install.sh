cd exercise
composer install
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan config:cache
php artisan view:clear
php artisan storage:link
php artisan migrate