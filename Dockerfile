FROM php:8.4.14-cli-alpine as base

RUN apk update && apk add zip

ARG COMPOSER_VERSION=2.8.12
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=$COMPOSER_VERSION

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin

RUN set -eux; \
    install-php-extensions \
    zip pcntl intl bcmath pdo pdo_pgsql rdkafka ds sockets amqp \
    && rm -rf /tmp/*

WORKDIR "/app"

FROM base as dev

RUN apk update && apk add git vim bash

ARG APP_USER_ID=1000
ARG APP_USER_NAME=appuser
RUN adduser -D -u ${APP_USER_ID} ${APP_USER_NAME}

USER ${APP_USER_NAME}
