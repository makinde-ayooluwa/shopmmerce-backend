# Use official PHP + Apache image
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install common PHP extensions (add more if your project needs)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Disable conflicting MPMs and enable prefork
RUN a2dismod mpm_event mpm_worker \
    && a2enmod mpm_prefork rewrite

# Enable mod_rewrite for clean URLs
RUN a2enmod rewrite

# Set permissions so Apache can read/write if needed
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Optional: Enable PHP error display for debugging (remove in production)
RUN echo "display_errors = On\nerror_reporting = E_ALL" > /usr/local/etc/php/conf.d/debug.ini

# Expose Apache port
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]