FROM php:${PHP_VERSION}

WORKDIR /var/www/html

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions pdo pdo_pgsql gd zip bcmath sockets redis exif

RUN set -ex \
    && apk --no-cache add \
    postgresql-dev

RUN mkdir -p /usr/src/php/ext/redis; \
    curl -fsSL --ipv4 https://github.com/phpredis/phpredis/archive/5.3.2.tar.gz | tar xvz -C "/usr/src/php/ext/redis" --strip 1; \
    docker-php-ext-install pgsql pdo pdo_pgsql bcmath sockets redis exif
