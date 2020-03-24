FROM dragoono/laravel-craftable:1.5

WORKDIR /app
COPY . /app

CMD php artisan serve --host=0.0.0.0 --port=80

EXPOSE 80
