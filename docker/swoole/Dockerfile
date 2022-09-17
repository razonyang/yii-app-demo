FROM phpswoole/swoole:5.0-php8.1-dev

RUN apt update

RUN apt install -y libicu-dev libonig-dev

RUN docker-php-ext-install mysqli pdo_mysql intl mbstring

WORKDIR /app

ENTRYPOINT php server.php
