FROM php:8.2.4-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get install -y libzip-dev zlib1g-dev mariadb-client libpng-dev \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install zip pdo_mysql \
  && apt-get install -y npm

#Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

# # redis
# RUN git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis
# RUN docker-php-ext-install redis
# RUN npm install -g license-checker

WORKDIR /var/www

RUN composer global require "laravel/installer"
