FROM php:8.1-cli-alpine3.19 as php-app

WORKDIR /app

RUN apk --no-cache update \
    && apk add --no-cache autoconf g++ make \
    postgresql-dev \
    \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    \
    && docker-php-ext-install pdo_pgsql

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

COPY . .

RUN composer install

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | sh \
        && apk add symfony-cli

ENTRYPOINT symfony server:start --port=8080






