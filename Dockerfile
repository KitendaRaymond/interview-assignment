FROM webdevops/php-nginx:7.1

RUN composer self-update --1

WORKDIR /var/www/html/public

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt install nodejs

ADD . .

RUN apt-get update
RUN apt-get install -y default-mysql-client libpng-dev
RUN docker-php-ext-install pdo_mysql

RUN composer install

RUN npm install