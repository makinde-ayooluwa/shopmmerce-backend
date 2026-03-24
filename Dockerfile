FROM php:8.2-cli

# Copy project files
COPY . /app
WORKDIR /app

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Expose Railway port
EXPOSE 8080

# Start PHP built-in server on Railway $PORT
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-8080} -t ."]