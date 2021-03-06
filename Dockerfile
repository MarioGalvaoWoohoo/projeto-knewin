FROM php:7.4-fpm-alpine

RUN apk add --no-cache \ 
    openssl \ 
    bash \
    postgresql \
    postgresql-dev \
    postgresql-client \
    postgresql-libs \
    build-base \
    ca-certificates \
    curl \
    gcc \
    git \
    libc-dev \
    libffi-dev \
    libgcc \
    make \
    musl-dev \
    openssl \
    openssl-dev \
    zlib-dev

RUN docker-php-ext-install bcmath pdo pdo_pgsql

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz


WORKDIR /var/www
RUN rm -rf /var/www/html 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


COPY api_laravel/docker/php.ini /usr/local/etc/php/

RUN chown -R www-data:www-data /var/www

RUN ln -s public html

EXPOSE 9000

ENTRYPOINT ["php-fpm"]

