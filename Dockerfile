FROM php:8.4-cli

WORKDIR /usr/src/app

COPY . .

RUN apt-get update && apt-get install -y --no-install-recommends \
    netcat-openbsd \
    libzip-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    cron \
    sudo \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip pcntl pgsql pdo_pgsql sockets
RUN docker-php-ext-configure gd --with-jpeg && docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

RUN composer install --no-interaction

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

CMD ["entrypoint.sh"]
