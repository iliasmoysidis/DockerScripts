FROM phpdockerio/php:8.3-fpm

WORKDIR /application

# Install necessary packages including Composer
RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.3-mysql \
    curl \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


