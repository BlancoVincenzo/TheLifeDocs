FROM    php:7.4-apache
WORKDIR /var/www/html/
COPY    src/ /var/www/html/
RUN     apt-get update && apt-get install -y iputils-ping
RUN     useradd dbh -c "DBH{ServingYourCommand}"
RUN     chown -R www-data:www-data /var/www/html/ && chmod 775 /var/www/html/
