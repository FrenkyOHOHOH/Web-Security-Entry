FROM ctftraining/base_image_nginx_mysql_php_56

COPY html /var/www/html
COPY php.ini /usr/local/etc/php
COPY flag.sh /flag.sh

RUN chown -R root:root /var/www/html && \
    chmod -R 755 /var/www/html