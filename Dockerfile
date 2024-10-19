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

# Exposer les ports pour PHP-FPM et Nginx
EXPOSE 9000 80

# Démarrer Nginx et PHP-FPM
CMD service nginx start && php-fpm
