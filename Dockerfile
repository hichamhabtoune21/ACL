FROM php:8.2-apache

# Aggiorna il sistema e installa le dipendenze necessarie
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install gettext && docker-php-ext-enable gettext
