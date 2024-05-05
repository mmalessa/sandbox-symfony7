FROM php:8.3.4-cli-bookworm

ARG COMPOSER_VERSION=2.7.2
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=$COMPOSER_VERSION

RUN apt-get update \
    && apt-get install -y curl git iputils-ping unzip

#xdebug
RUN pecl install xdebug-3.3.1 \
    && docker-php-ext-enable xdebug

WORKDIR "/app"

ARG APP_USER_ID
RUN useradd -s /bin/bash -u ${APP_USER_ID} -m appuser
USER appuser
