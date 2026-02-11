FROM php:8.2-fpm 
# Instala dependências do sistema via apt
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        mysqli \
        zip \
        gd \
        mbstring \
        exif \
        pcntl \
        bcmath \ 
        intl \
        opcache \
    && pecl install redis \
    && docker-php-ext-enable redis

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Working dir
WORKDIR /application

EXPOSE 9000
CMD ["php-fpm"]