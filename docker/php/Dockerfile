FROM php:8.2-fpm-alpine

# RUN apt-get update && apt-get install -y \
#     zip \
#     unzip \
#     dos2unix \
#     supervisor \
#     libfreetype-dev \
#     $PHPIZE_DEPS \
#     curl \
#     libicu-dev \
#     libbz2-dev \
#     libjpeg-dev \
#     libpng-dev \
#     libmcrypt-dev \
#     libreadline-dev \
#     libfreetype6-dev \
#     libonig-dev \
#     libzip-dev \
#     libpq-dev \
#     gnupg

RUN docker-php-ext-install pdo pdo_mysql 
#mbstring zip exif pcntl && docker-php-ext-enable gd mysqli pdo_mysql

# COPY docker/php/conf.d/* $PHP_INI_DIR/conf.d/

CMD ["php-fpm"]