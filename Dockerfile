FROM php:7.4-apache
RUN docker-php-ext-install mysqli
USER root
RUN chmod root 0777 /
RUN mkdir -p /logs
RUN mkdir -p /uploads