#!/usr/bin/env bash
set -e

# Ensure Laravel cache/view directories exist & are writable
mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 0775 storage bootstrap/cache || true

# Try migrations/seed (don't fail the container if DB not ready)
php artisan migrate --force || echo "Migration failed or DB not ready"
php artisan db:seed --force || echo "Seeding failed or DB not ready"

# Start the app
php artisan serve --host=0.0.0.0 --port=8000