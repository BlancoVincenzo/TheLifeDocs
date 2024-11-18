# Information Gathering - Web Edition

## WHOIS - The Giant Phonebook of the internet

A query and resonse protocol to access stored information about internet ressources

### WHOIS Record data 

- Domain Name
- Register Company and theier contact info (e.g. RegistryGate GMBH etc.)
- Administrative Contact (Often kept private)
- Technical Contact
- Creation & Expiration Date
- Name-Servers (translating Domain-Name into IP)


### Why WHOIS for Web Recon? 

- Identifying Key Personnel | Names, E-Mail, Phone-Numbers

- Critical Infrastructure like DNS Server, IP-Addresses

- Historical Data [WHOIS Freaks](https://whoisfreaks.com/signup.html)


## Utilizing WHOIS

**1. Phising Attack** | Registration Date of Email-Domain, Registrant, Name-Server (e.g. Hosting Provider for Malicious Activities)

**2. Maleware Analysis**  | Registrant (e.g. Indivudal using a anonymous email provider), Location (e.g. states with high Cybercrime), Registrar (e.g. lax abuse)

**3. Threat Intelligence Report** | 
Registrant (e.g. Fake aliases etc.), Name Server (e.g. Infrastructure Detection), Takedown History (Reveal law enforcement / security interventions)

### The Host File under Linux 
C:\Windows\System32\drivers\etc\hosts
/etc/hosts 

IPs can be blocked by redirecting them to 
0.0.0.0     unwanted.com

A Domain and its supdoamins usually belong to a specific DNS zone

Zone-File for a Domain can be accessed from the hoster-Interfaces

| DNS Concept                | Description                                                                 | Example                                               |
|----------------------------|-----------------------------------------------------------------------------|-------------------------------------------------------|
| **Domain Name**            | A human-readable label for a website or other internet resource.           | [www.example.com](http://www.example.com)            |
| **IP Address**             | A unique numerical identifier assigned to each device connected to the internet. | `192.0.2.1`                                          |
| **DNS Resolver**           | A server that translates domain names into IP addresses.                   | Your ISP’s DNS server or public resolvers like Google DNS (`8.8.8.8`) |
| **Root Name Server**       | The top-level servers in the DNS hierarchy.                                | There are 13 root servers worldwide, named A-M: `a.root-servers.net` |
| **TLD Name Server**        | Servers responsible for specific top-level domains (e.g., `.com`, `.org`). | Verisign for `.com`, PIR for `.org`                  |
| **Authoritative Name Server** | The server that holds the actual IP address for a domain.                | Often managed by hosting providers or domain registrars. |
| **DNS Record Types**       | Different types of information stored in DNS.                              | A, AAAA, CNAME, MX, NS, TXT, etc.                    |


| Record Type | Full Name                  | Description                                                                                      | Zone File Example                                                   |
|-------------|----------------------------|--------------------------------------------------------------------------------------------------|----------------------------------------------------------------------|
| **A**       | Address Record             | Maps a hostname to its IPv4 address.                                                            | `www.example.com. IN A 192.0.2.1`                                   |
| **AAAA**    | IPv6 Address Record        | Maps a hostname to its IPv6 address.                                                            | `www.example.com. IN AAAA 2001:db8:85a3::8a2e:370:7334`             |
| **CNAME**   | Canonical Name Record      | Creates an alias for a hostname, pointing it to another hostname.                               | `blog.example.com. IN CNAME webserver.example.net.`                 |
| **MX**      | Mail Exchange Record       | Specifies the mail server(s) responsible for handling email for the domain.                     | `example.com. IN MX 10 mail.example.com.`                           |
| **NS**      | Name Server Record         | Delegates a DNS zone to a specific authoritative name server.                                   | `example.com. IN NS ns1.example.com.`                               |
| **TXT**     | Text Record                | Stores arbitrary text information, often used for domain verification or security policies.     | `example.com. IN TXT "v=spf1 mx -all"` (SPF record)                 |
| **SOA**     | Start of Authority Record  | Specifies administrative information about a DNS zone, including the primary name server, responsible person's email, and other parameters. | `example.com. IN SOA ns1.example.com. admin.example.com. 2024060301 10800 3600 604800 86400` |
| **SRV**     | Service Record             | Defines the hostname and port number for specific services.                                     | `_sip._udp.example.com. IN SRV 10 5 5060 sipserver.example.com.`    |
| **PTR**     | Pointer Record             | Used for reverse DNS lookups, mapping an IP address to a hostname.                              | `1.2.0.192.in-addr.arpa. IN PTR www.example.com.`                   |

