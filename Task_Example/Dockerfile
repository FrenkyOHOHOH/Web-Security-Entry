FROM php:5.6-apache  

# 导入基础web环境镜像
# 先复制到临时文件夹，这样避免对源文件造成误删等其他影响。

COPY ./src /tmp/          
RUN cp -rf /tmp/html/ /var/www/ && \       
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    rm -rf /tmp/html
    
    #这些就是基本php的一些关键提升权限等，避免无法使用文件
 
CMD sh -c "sed -i "s/flag{example}/$FLAG/" /var/www/html/index.php && export FLAG=not_flag && FLAG=not_flag && apache2-foreground"