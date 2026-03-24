# Use official PHP Apache image
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Enable Apache modules
# Only enable one MPM: prefork for mod_php
RUN a2dismod mpm_event mpm_worker \
    && a2enmod mpm_prefork \
    && a2enmod rewrite \
    && docker-php-ext-install pdo pdo_mysql

# Expose port
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]