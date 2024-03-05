FROM php:8.2-apache

# Instalar dependencias
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Variables de entorno
ENV COMPOSER_ALLOW_SUPERUSER 1

# Instalar dependencias
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo_mysql

# Habilitar el módulo rewrite de Apache
RUN a2enmod rewrite

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar archivos de la aplicación Laravel al directorio de trabajo del contenedor
COPY . /var/www/html/

RUN composer install

# Cambiar los permisos de los archivos para que el usuario de Apache pueda acceder a ellos
# RUN chown -R www-data:www-data /var/www/html/storage
# RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
# RUN chown -R www-data:www-data /var/www/html/vendor
# RUN chown -R www-data:www-data /var/www/html/*

# Ejecutar comandos de Artisan para generar la clave
RUN php /var/www/html/artisan key:generate

