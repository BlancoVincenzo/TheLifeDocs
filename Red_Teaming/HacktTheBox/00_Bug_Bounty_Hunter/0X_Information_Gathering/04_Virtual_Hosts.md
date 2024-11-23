# Virtul Hosts 

- Apache, Nginx, IIS can host multiple Websites on a single server

- achived through virtual hosting

Normally Sobdomains do have their own DNS Records (poinintg to same Ip or different one)

VHosts do have one IP handling incoming request by their own

VHost Fuzzing to discover public & non-public subdomains and VHosts

VHosts can be configured to use differnt domains

# Example of Name-Based Virtual Host Configuration in Apache

```apache
<VirtualHost *:80>
    ServerName www.example1.com
    DocumentRoot /var/www/example1
</VirtualHost>

<VirtualHost *:80>
    ServerName www.example2.org
    DocumentRoot /var/www/example2
</VirtualHost>

<VirtualHost *:80>
    ServerName www.another-example.net
    DocumentRoot /var/www/another-example
</VirtualHost>

```
Web Server Handels uses Host Header to serve specidic requested content