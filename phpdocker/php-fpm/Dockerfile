FROM phpdockerio/php:8.2-fpm
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive
ARG NODE_VERSION=18

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php8.2-mysql \
    && apt-get -y --no-install-recommends install  php8.2-mysql \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git e npm e nodejs
RUN apt-get update \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && apt-get -y autoremove \
    && apt-get clean

RUN apt-get update \
    && apt-get -y install php8.2-gd \
    && apt-get -y install php8.2-intl \
    && apt-get -y install php8.2-xsl
