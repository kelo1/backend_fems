FROM php:8.2-fpm

# Set working directory
WORKDIR /app

# Install necessary packages
RUN apt-get update -y \
 && apt-get install -y openssl zip unzip git libicu-dev zlib1g-dev libgd-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install pdo intl zip && apt-get install -y netcat-openbsd inetutils-ping vim iproute2

# Compile the GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql gd

# Verify the GD extension installation
RUN php -m | grep gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Make the Composer executable available system-wide
RUN ls -alh /usr/local/bin/composer

# Set the permissions for the Composer executable
RUN chmod +x /usr/local/bin/composer

# Verify Composer installation
RUN composer --version

# Copy application files
COPY . /app

# Install application dependencies
RUN composer update && composer install

# Expose port 8181
EXPOSE 8181

# Command to run the application
CMD php artisan serve --host=0.0.0.0 --port=8181
