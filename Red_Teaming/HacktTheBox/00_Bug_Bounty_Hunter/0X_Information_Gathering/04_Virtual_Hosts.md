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

## Different Types of Virtual-Hosting

Name-Based Virtual Hosting - relies solely on HTTP Host Header

IP-Based Virtual Hosting assigns a different IP-Address to each Website <-- expensive and less scalable

Bort-Based Virtual Hosting is when each Website gets its own PORT on an IP <--> requiers the user to specify the port in the url...less common

## Virtual Host discovery Tools

| Tool         | Description                                                                                         | Features                                                                                          |
|--------------|-----------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------|
| Gobuster     | A multi-purpose tool often used for directory/file brute-forcing, but also effective for virtual host discovery. | Fast, supports multiple HTTP methods, can use custom wordlists.                                  |
| Feroxbuster  | Similar to Gobuster, but with a Rust-based implementation, known for its speed and flexibility.      | Supports recursion, wildcard discovery, and various filters.                                     |
| ffuf         | Another fast web fuzzer that can be used for virtual host discovery by fuzzing the Host header.      | Customizable wordlist input and filtering options.                                               |
### Gobuster 

1. Identify Target IP-Address

2. Preapre Wordlist containing virtual-host-names

```bash

gobuster vhost -u http://<target_IP_address> -w <wordlist_file> --append-domain

```

Add IP to /etc/hosts 

then use ip alias + PORT test.xyz:123 in the request