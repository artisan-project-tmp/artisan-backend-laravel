FROM php:8.2-cli

# Install system dependencies and PostgreSQL drivers
RUN apt-get update && apt-get install -y \
    libpq-dev \
    nodejs \
    npm \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy application files
COPY . .

# Install PHP and Node dependencies (Build Phase)
RUN composer install --optimize-autoloader --no-dev
RUN npm install && npm run build

# At runtime, run migrations and start the server using Render's dynamic $PORT
CMD bash -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT"
