FROM dragoono/laravel-craftable:1.5

WORKDIR /app
COPY . /app

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader

CMD php artisan serve --host=0.0.0.0 --port=80

EXPOSE 80
