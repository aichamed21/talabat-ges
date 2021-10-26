# syntax=docker/dockerfile:1
FROM php:8.0-fpm

COPY --chown=www:www ./dockerize/build/ /build

RUN /build/php.sh

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
