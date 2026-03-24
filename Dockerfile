FROM php:8.2-apache

# Install MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Copy app
COPY . /var/www/html/

# Set working dir
WORKDIR /var/www/html/

# Enable rewrite for routing
RUN a2enmod rewrite

EXPOSE 80

# Railway automatically routes HTTP traffic to port 80