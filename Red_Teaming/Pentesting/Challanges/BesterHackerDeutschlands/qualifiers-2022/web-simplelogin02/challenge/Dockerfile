# syntax=docker/dockerfile:1
FROM pensiero/apache-php-mysql:php7.4 as builder

CMD mkdir /var/www/public
WORKDIR /var/www/public
COPY src/ /var/www/public/
RUN chown -R www-data:www-data /var/www
RUN chmod -R g+rw /var/www

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
ENV APACHE_RUN_DIR /var/run/apache2

RUN apt-get update \
  && apt-get -y install mysql-server --no-install-recommends || true

COPY setup.sql /tmp/
CMD service mysql start && mysql -u root --password='' < /tmp/setup.sql && service apache2 start && tail -F /var/log/mysql/error.log
