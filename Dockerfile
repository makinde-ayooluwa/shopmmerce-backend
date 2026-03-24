# Use official PHP image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Disable conflicting MPMs and enable prefork
RUN a2dismod mpm_event mpm_worker \
    && a2enmod mpm_prefork rewrite

# Enable mod_rewrite for pretty URLs
RUN a2enmod rewrite

# Set permissions (optional but good for uploads/logs)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]