# Usa una imagen base de PHP con Apache
FROM php:8.1-apache

# Instala las dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Habilita la reescritura de Apache (para Laravel)
RUN a2enmod rewrite

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia todos los archivos de tu proyecto a Docker
COPY . .

# Instala las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Expone el puerto 80
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]
