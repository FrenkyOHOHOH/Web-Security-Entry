FROM php:5.6-apache

COPY flag.sh /flag.sh
COPY html /var/www/html
COPY sources.list /etc/apt/sources.list
RUN apt update && \
    apt install -y git

RUN chmod +x /flag.sh

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

CMD sh -c "/flag.sh && export FLAG=not_flag && FLAG=not_flag && apache2-foreground"