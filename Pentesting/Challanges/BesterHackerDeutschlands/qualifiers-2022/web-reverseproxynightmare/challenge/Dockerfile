FROM nginx/unit:1.27.0-php8.1
COPY src/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html/ && chmod 775 /var/www/html/
COPY config/unit.conf.json /docker-entrypoint.d/

CMD ["unitd", "--no-daemon", "--control", "unix:/var/run/control.unit.sock"]