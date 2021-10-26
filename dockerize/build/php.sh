#!/bin/bash

# Install dependencies
apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
docker-php-ext-install pdo_mysql mbstring zip exif pcntl
docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
docker-php-ext-install gd
