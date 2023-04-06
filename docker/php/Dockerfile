FROM ghcr.io/roadrunner-server/roadrunner:2.12.3 AS roadrunner
FROM php:8.2-cli

RUN apt-get update && \
    apt-get install -y vim curl git zip unzip procps \
        libicu-dev
RUN docker-php-ext-install intl pdo_mysql

RUN docker-php-ext-install sockets


# xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY ./docker/php/php.ini /usr/local/etc/php/

COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

COPY --from=roadrunner /usr/bin/rr /usr/local/bin/rr
