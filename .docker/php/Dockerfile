FROM php:8.2.1-fpm

ARG COMPOSER_VER

ENV COMPOSER_VER ${COMPOSER_VER:-2.5.8}

WORKDIR /var/www/html

# Install some system shit
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
    nano \
    gcc \
    make \
    autoconf \
    libc-dev \
    pkg-config \
    sudo \
    wget \
    curl \
    git \
    supervisor \
    libicu-dev \
    libonig-dev \
    libmemcached-dev \
    libz-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    build-essential \
    libsasl2-dev \
    libssl-dev \
    libmcrypt-dev \
    libxml2-dev \
    libbz2-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    subversion \
    libmagickwand-dev \
    zlib1g-dev \
    unzip \
    libzip-dev \
    libxml2-dev \
    openssl \
    ffmpeg \
    python2-minimal \
        && /bin/echo -e \
            "date.timezone = \"UTC\"" \
            "\nmemory_limit=-1" \
            "\nupload_max_filesize=1G" \
            "\npost_max_size=1G" \
            "\nmax_execution_time=90" \
            "\nrequest_terminate_timeout = 90s" \
            "\nzend.enable_gc=1" \
            > /usr/local/etc/php/conf.d/php.ini \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype \
    --with-webp \
    --with-jpeg
# Install base php extensions
RUN docker-php-ext-install opcache pdo_mysql mbstring zip mysqli xml bcmath intl sockets gd

RUN docker-php-ext-install exif && docker-php-ext-enable exif
RUN docker-php-ext-install pcntl && docker-php-ext-enable pcntl

# Install imagick
RUN pecl install imagick && docker-php-ext-enable imagick

# Install xdebug
RUN pecl install xdebug-3.2.0 && docker-php-ext-enable xdebug

# Install redis ext
RUN pecl install redis && docker-php-ext-enable redis

# Install php-memcached
RUN git clone -b master https://github.com/php-memcached-dev/php-memcached /usr/src/php/ext/memcached \
    && docker-php-ext-configure /usr/src/php/ext/memcached \
        --disable-memcached-sasl \
    && docker-php-ext-install /usr/src/php/ext/memcached \
    && rm -rf /usr/src/php/ext/memcached

RUN curl -sS https://getcomposer.org/installer | \
            php -- --install-dir /usr/local/bin --filename composer --version ${COMPOSER_VER}
