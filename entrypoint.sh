#!/bin/sh

echo "Waiting DB..."

while ! nc -z db 5432; do
  echo "DB not ready. Waiting..."
  sleep 2
done

echo "DB's ready. Running migrations..."

sleep 2

php artisan migrate --force

if ! php artisan app:check-seeder; then
  echo "Running seeders..."
  php artisan db:seed --force
else
  echo "All seeders ran."
fi

php artisan serve --host=0.0.0.0 --port=8000
