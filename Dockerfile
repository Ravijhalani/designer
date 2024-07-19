# Use the official PHP 8.1 image as a base
FROM php:8.1

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

# Install PHP extensions required by Laravel
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Copy the rest of the application code
COPY . /var/www
WORKDIR /var/www

# Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts --no-autoloader

# Generate the optimized autoload files
RUN composer dump-autoload --optimize

# Expose port 8000 to the Docker host
EXPOSE 8000

# Start the Laravel application
ENTRYPOINT /bin/bash run.sh