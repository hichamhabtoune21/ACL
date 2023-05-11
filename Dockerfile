FROM php:8.2-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install gettext && docker-php-ext-enable gettext

RUN apk update \
    && apk add --no-cache git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json composer.lock /app/
RUN composer install --no-scripts --no-autoloader --no-dev --prefer-dist


RUN php composer.phar dump-autoload --no-scripts --no-dev --optimize

RUN php bin/console cache:warmup

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    
COPY translations.yaml config/packages/translations.yaml
COPY services.yaml config/services.yaml

CMD ["php", "bin/console", "translation:extract"]
