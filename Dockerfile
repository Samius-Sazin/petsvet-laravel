# # Use PHP 8.2 FPM image
# FROM php:8.2-fpm

# # Install system dependencies
# RUN apt-get update && apt-get install -y \
#     git unzip libpng-dev libonig-dev libxml2-dev zip curl

# # Install PHP extensions required by Laravel
# RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd \
#     && apt-get update && apt-get install -y libpq-dev \
#     && docker-php-ext-install pdo_pgsql


# # Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Set working directory
# WORKDIR /var/www/html

# # Copy project files
# COPY . .

# # Install Laravel dependencies
# RUN composer install --no-dev --optimize-autoloader

# # Ensure storage and cache directories exist and are writable
# RUN mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
#     && chown -R www-data:www-data storage bootstrap/cache \
#     && chmod -R 775 storage bootstrap/cache

# # Expose port 8000
# EXPOSE 8000

# # Run migrations, seeders, and start Laravel server
# CMD php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8000

# Use PHP 8.2 FPM image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip curl libzip-dev libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Copy env for build
COPY .env.example .env

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Ensure storage and cache directories exist and are writable
RUN mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Clear and cache Laravel config, routes, views
RUN php artisan config:clear \
    && php artisan cache:clear \
    && php artisan view:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Expose PHP-FPM port
EXPOSE 9000

# Run migrations and seeders, then start PHP-FPM
CMD php artisan migrate --force && php artisan db:seed --force && php-fpm
