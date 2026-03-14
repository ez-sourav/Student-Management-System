FROM php:8.2-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev zip curl \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Fix Laravel permissions
RUN chmod -R 775 storage
RUN chmod -R 775 bootstrap/cache

CMD sh -c "php artisan migrate --force && php -S 0.0.0.0:$PORT -t public"