# Utilisation de l'image officielle PHP 8.1 FPM
FROM php:8.1-fpm

# Définir le répertoire de travail
WORKDIR /var/www

# Installer les dépendances et nettoyer les caches
RUN apt-get update && apt-get install -y --no-install-recommends \
  build-essential \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  locales \
  zip \
  jpegoptim optipng pngquant gifsicle \
  vim \
  unzip \
  git \
  curl \
  libonig-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd \
  && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer globalement
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application
COPY . /var/www

# Copier les permissions pour www-data
COPY --chown=www-data:www-data . /var/www

# Changer l'utilisateur actuel à www-data
USER www-data

# Exposer le port 9000 et démarrer PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
