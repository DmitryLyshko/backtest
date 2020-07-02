FROM php:7.4

RUN apt-get -y update --fix-missing
RUN apt-get upgrade -y

RUN apt-get -y install --fix-missing apt-utils build-essential git curl  libcurl4 libcurl4-openssl-dev zip libxml2-dev libzip-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install curl dom tokenizer json zip bcmath xml intl pcntl -j$(nproc) sysvsem sockets

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev

WORKDIR /app
COPY . /app
RUN composer install
RUN composer dump-autoload --optimize
CMD ["php", "App.php", "--filename=tasks.json", "--type=file"]