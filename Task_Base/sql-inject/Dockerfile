FROM ctftraining/base_image_nginx_mysql_php_56

RUN rm -f /var/www/html/*
COPY sqli-labs /var/www/html
COPY php.ini /usr/local/etc/php
COPY nginx.conf /etc/nginx/nginx.conf
COPY flag.sh /flag.sh

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html