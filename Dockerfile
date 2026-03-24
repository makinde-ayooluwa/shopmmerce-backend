FROM php:8.2-apache

# Install required extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy project files
COPY . /var/www/html/
WORKDIR /var/www/html/

# Enable Apache rewrite (needed for frameworks)
RUN a2enmod rewrite

EXPOSE 80