FROM debian:buster

RUN apt update && apt dist-upgrade -y && \
    # DEPENDENCIES #############################################################
    apt install -y wget curl apt-transport-https ca-certificates lsb-release git unzip && \
    # PHP DEB.SURY.CZ ##########################################################
    wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg && \
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list && \
    apt update && \
    apt dist-upgrade -y

RUN apt install -y --no-install-recommends \
    php5.6-apcu \
    php5.6-common \
    php5.6-cli \
    php5.6-curl \
    php5.6-fpm \
    php5.6-gd \
    php5.6-imagick \
    php5.6-intl \
    php5.6-ldap \
    php5.6-mcrypt \
    php5.6-mysql

RUN apt clean -y && \
    apt autoclean -y && \
    apt remove -y wget curl lsb-release && \
    apt autoremove -y && \
    rm -rf /var/lib/apt/lists/* /var/lib/log/* /tmp/* /var/tmp/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY fallout.pool.conf /etc/php5/fpm/pool.d/

RUN echo 'opcache.max_accelerated_files=1' >> /etc/php5/fpm/php.ini \
    && echo 'opcache.revalidate_freq=1' >> /etc/php5/fpm/php.ini

WORKDIR /var/www

RUN usermod -u 1000 www-data

EXPOSE 9000

CMD ["php-fpm5.6"]