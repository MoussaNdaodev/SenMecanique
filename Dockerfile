# Utiliser une image de base PHP 8.2
FROM php:8.2-fpm

# Installer les extensions et dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zlib1g-dev \
    libzip-dev \
    unzip \
    nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip exif

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances PHP
RUN composer install

# Copier le fichier de configuration Nginx
COPY nginx/default.conf /etc/nginx/conf.d/default.conf

# Créer les répertoires storage et cache s'ils n'existent pas et ajuster les permissions
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exposer les ports pour PHP-FPM et Nginx
EXPOSE 9000 80

# Démarrer Nginx, exécuter les migrations et démarrer PHP-FPM
CMD service nginx start && php artisan migrate --force && php-fpm
