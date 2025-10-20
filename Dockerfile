# Gunakan image PHP resmi dengan ekstensi yang dibutuhkan Laravel
FROM php:8.2-fpm

# Install dependencies sistem dan ekstensi PHP yang dibutuhkan
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy seluruh file proyek
COPY . .

# Install dependency Laravel
RUN composer install

# Set permission untuk storage dan bootstrap
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port untuk PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]