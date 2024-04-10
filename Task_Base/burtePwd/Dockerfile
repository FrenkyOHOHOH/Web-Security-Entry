FROM php:5.6-apache

COPY index.php /var/www/html
COPY top1000.txt /top1000.txt
COPY randomPwd.sh /randomPwd.sh

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod +x /randomPwd.sh

CMD sh -c "/randomPwd.sh && sed -i "s/flag{example}/$FLAG/" /var/www/html/index.php && export FLAG=not_flag && FLAG=not_flag && apache2-foreground"