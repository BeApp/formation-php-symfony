FROM php:8.1.8-fpm-alpine
MAINTAINER Damien Villeneuve <d.villeneuve@beapp.fr>

RUN apk --update add libzip-dev icu-dev oniguruma-dev libxml2-dev libpng-dev jpeg-dev freetype-dev libxslt-dev

# iconv removed from alpine
RUN apk add --update --no-cache \
    --repository http://dl-cdn.alpinelinux.org/alpine/v3.16/community/ \
    --allow-untrusted \
    gnu-libiconv

RUN apk add --update --no-cache bash
#    python3 py3-pip make g++

RUN docker-php-ext-install \
    # Compression
    zip \
    # Strings / Charset
    intl mbstring \
    # Databases
    pdo_mysql mysqli \
    # XLS
    xsl \
    # Others
    bcmath calendar opcache

# Images
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install gd exif

RUN apk --update add --virtual .build-deps $PHPIZE_DEPS linux-headers \
    && pecl install xdebug-3.2.0 \
    && apk del -f .build-deps \
    && touch /var/log/xdebug.log \
    && chmod a+w /var/log/xdebug.log

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer --version=2.5.4 \
    && chmod +x /usr/local/bin/composer

# NodeJS (currently 16.19 on this repository)
RUN apk add --update --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/v3.16/main nodejs

# Yarn
RUN apk add --update yarn

## Symfony CLI
#RUN apk add --update git \
#    && curl -sS https://get.symfony.com/cli/installer | bash \
#    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
