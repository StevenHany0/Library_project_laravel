#!/bin/sh

# Run migrations safely
php artisan migrate --force || true

# Start Laravel server
exec php artisan serve --host=0.0.0.0 --port=10000
