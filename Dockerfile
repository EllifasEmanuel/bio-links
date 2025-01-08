FROM php:8.3-fpm-alpine3.20

# Install necessary dependencies
RUN apk update && apk add --no-cache \
    zip \
    unzip \
    nano \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    linux-headers \
    libpq-dev \
    brotli \
    brotli-dev \
    bash \
    autoconf \
    g++ \
    make \
    icu-dev \
    libxml2-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP extensions
RUN docker-php-ext-install pcntl sockets pdo_mysql gd bcmath intl soap zip

# Copy the application files to the container
COPY . /var/www

# Set the working directory
WORKDIR /var/www
