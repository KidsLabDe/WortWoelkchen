FROM php:8.2-apache-buster AS ww-dev
COPY . /app/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV APP_ENV=dev
ENV APP_DEBUG=true
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update && apt-get install -y zip zlib1g-dev libpng-dev libicu-dev
RUN docker-php-ext-install pdo pdo_mysql gd 


COPY . /var/www/html/

RUN composer install --prefer-dist --no-interaction

COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY .env.dev /var/www/html/.env

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan migrate && \
    chmod 777 -R /var/www/html/storage/ && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite

