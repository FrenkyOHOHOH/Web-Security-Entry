FROM php:5.6-apache

ENV LC_ALL C.UTF-8
ENV TZ=Asia/Shanghai

COPY . /tmp/
COPY sources.list /etc/apt/sources.list
# config apache && php
RUN cp /tmp/docker-php.conf /etc/apache2/conf-available/docker-php.conf &&\
    cp /tmp/php.ini /usr/local/etc/php/ &&\
    cp /tmp/php.ini /usr/local/etc/php/conf.d/

# install git && php ext
RUN apt-get update && \
    apt-get install -y libgd-dev &&\
    apt-get install -y git &&\
    docker-php-ext-install gd &&\
    docker-php-ext-enable gd &&\
    docker-php-ext-install exif &&\
    docker-php-ext-enable exif &&\
    rm -rf /var/lib/apt/lists/*

COPY upload-labs /tmp/upload-labs
# install upload-labs
RUN cd /tmp/ &&\
    rm -rf /var/wwww/html/* &&\
    mv /tmp/upload-labs/* /var/www/html/ &&\
    chown www-data:www-data -R /var/www/html/ && \
    rm -rf /tmp/*

EXPOSE 80

CMD sh -c "echo $FLAG > /flag && export FLAG=not_flag && FLAG=not_flag && apache2-foreground"