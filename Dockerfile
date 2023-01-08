FROM php:7.4-apache
RUN docker-php-ext-install mysqli
USER www-data
RUN chmod www-data 0777 /
RUN mkdir -p /logs