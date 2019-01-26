FROM kerkoleng/centos-php-nginx:1.1

COPY . /var/www/html

WORKDIR /var/www/html

RUN rm -rf composer.lock 
RUN chmod -R 777 storage

# RUN composer install  --no-dev 
# COPY env.example .env

# Executing supervisord
# CMD ["supervisord" , "-n"]
