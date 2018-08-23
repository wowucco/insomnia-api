FROM php:7.1.14-fpm-alpine3.4

ENV FILES_PATH /var/www
ENV GITHUB_TOKEN 3877f03733e3007e6e314c35d97e92cc5e1ebdb4
ENV PHPIZE_DEPS \
    autoconf \
    cmake \
    file \
    g++ \
    gcc \
    libc-dev \
    pcre-dev \
    make \
    git \
    pkgconf \
    re2c
RUN apk update \
    && apk add --no-cache nano wget curl git zip unzip nodejs icu-dev

RUN apk add --no-cache --virtual .persistent-deps \
    # for intl extension
    icu-dev \
    # for mcrypt extension
    libmcrypt-dev \
    # for postgres
    postgresql-dev \
    #install dependencies
    && set -xe \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        openssl-dev \
        zeromq-dev \
    && docker-php-ext-configure bcmath --enable-bcmath \
    && docker-php-ext-configure intl --enable-intl \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql \
    && docker-php-ext-configure pdo_pgsql --with-pgsql \
    && docker-php-ext-configure mbstring --enable-mbstring \
    && docker-php-ext-install \
        bcmath \
        intl \
        mcrypt \
        pdo_mysql \
        pdo_pgsql \
        mbstring

# Daemonize fpm
RUN sed -i s/no/yes/ /usr/local/etc/php-fpm.d/zz-docker.conf

# Composer
RUN \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer config -g github-oauth.github.com  $GITHUB_TOKEN && \
    php -v

RUN echo http://dl-2.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories \
    && apk --no-cache add shadow \
    && usermod -u 1000 www-data \
    && groupmod -g 1000 www-data \
    && chown -vR 1000:1000 /home/www-data \
    && usermod -d /home/www-data/ www-data

# install nginx
RUN apk add nginx && chown -R www-data:www-data /var/lib/nginx
COPY ./config/nginx /etc/nginx

COPY [--chown=www-data:www-data] ./start.sh /var

WORKDIR $FILES_PATH