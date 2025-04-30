#!/bin/sh

echo "Waiting DB..."

while ! nc -z db 5432; do
  echo "DB not ready. Waiting..."
  sleep 2
done

echo "DB's ready. Running migrations and seeders..."

sleep 2

php artisan migrate --force
php artisan db:seed --force

php artisan serve --host=0.0.0.0 --port=8000
