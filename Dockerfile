FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install gettext && docker-php-ext-enable gettext
RUN apt-get update && apt-get upgrade -y
