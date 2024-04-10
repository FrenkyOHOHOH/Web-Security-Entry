FROM php:5.6-apache

COPY index.php /var/www/html

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

CMD sh -c "sed -i "s/flag{example}/$FLAG/" /var/www/html/index.php && export FLAG=not_flag && FLAG=not_flag && apache2-foreground"