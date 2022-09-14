FROM phpswoole/swoole:5.0-php8.1-dev

RUN docker-php-ext-install mysqli pdo_mysql

WORKDIR /app

ENTRYPOINT php server.php
