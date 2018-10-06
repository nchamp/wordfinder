FROM phalconphp/php-apache:ubuntu-16.04
MAINTAINER Nicholas Potesta

ARG COMPOSER_RESOLUTION_LEVEL=no-dev

COPY . /usr/src/wordfinder
WORKDIR /usr/src/wordfinder

# resolve composer dependencies
RUN composer install --${COMPOSER_RESOLUTION_LEVEL}

RUN apt-get update && \
	apt-get install -y wbritish

RUN rm -rf /app && \
	ln -s /usr/src/wordfinder/www/ /app

