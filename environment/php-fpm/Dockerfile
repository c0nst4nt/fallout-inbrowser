FROM debian:jessie

RUN apt-get update && apt-get install -y \
        curl \
        git \
        php5-apcu \
        php5-common \
        php5-cli \
        php5-curl \
        php5-fpm \
        php5-gd \
        php5-imagick \
        php5-intl \
        php5-ldap \
        php5-mcrypt \
        php5-mysql \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY fallout.pool.conf /etc/php5/fpm/pool.d/

RUN echo 'opcache.max_accelerated_files=1' >> /etc/php5/fpm/php.ini \
    && echo 'opcache.revalidate_freq=1' >> /etc/php5/fpm/php.ini

WORKDIR /var/www

RUN usermod -u 1000 www-data

EXPOSE 9000

CMD ["php5-fpm", "-F"]