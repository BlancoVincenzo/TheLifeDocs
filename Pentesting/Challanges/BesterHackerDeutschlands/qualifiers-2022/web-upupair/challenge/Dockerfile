FROM    php:7.4-apache
WORKDIR /var/www/html/
COPY    src/ /var/www/html/
# Note: modified to allow path traversal
COPY    apache2.conf /etc/apache2/apache2.conf
# Adding challenge Flag
RUN     useradd dbh -c "DBH{dee293c3d4b666030f0e50c2d8d38e2ce2b14837}"
RUN     chown -R www-data:www-data /var/www/html/ && chmod 775 /var/www/html/
