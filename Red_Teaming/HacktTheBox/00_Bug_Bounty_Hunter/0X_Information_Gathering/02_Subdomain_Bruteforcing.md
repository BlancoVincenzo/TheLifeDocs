# Subdomain Brute-Force Enumeration 

- active reconnaissance activiry
- systematically testing subdomains against target
- wordlists for increasing the efficency / effectiveness

## The Process 

1. Wordlist Selection
- General-Purpose: Black-Box Scenario (e.g. staginng, blog, mail, admin, test etc.)
- Targeted: Focus on specific tech relevant to target
- Custom: Create own wordlists
2. DNS Query made for each potential sub-domain
3. Filtering and Vildating sucessfully scanned subdomains

## Tools for Sub-Domain Bruteforcing

# DNS Enumeration Tools

| Tool         | Description                                                                                         |
|--------------|-----------------------------------------------------------------------------------------------------|
| **dnsenum**  | Comprehensive DNS enumeration tool that supports dictionary and brute-force attacks for discovering subdomains. |
| **fierce**   | User-friendly tool for recursive subdomain discovery, featuring wildcard detection and an easy-to-use interface. |
| **dnsrecon** | Versatile tool that combines multiple DNS reconnaissance techniques and offers customizable output formats. |
| **amass**    | Actively maintained tool focused on subdomain discovery, known for its integration with other tools and extensive data sources. |
| **assetfinder** | Simple yet effective tool for finding subdomains using various techniques, ideal for quick and lightweight scans. |
| **puredns**  | Powerful and flexible DNS brute-forcing tool, capable of resolving and filtering results effectively. |

### DNSEnum 

- DNS-Record Enumeration (A - ipv4 Address, AAAA - quad A ipv6 NS - NameServer / DNS-Server, MX - Mailserver, TXT - Text entries)
- Zone Transfer Attempts
- Google Scraping
- Reverse DNS (identifies associated domains with IP)
- WHOIS Lookup (owner-ship, registration details)


### Command of DNSEnum

Basic **dnsenum** + tuning options like **--enum**

-f + /usr/share wordlist path

-r enables recursively; if one sudomain is found, try to enumerate subdomains of subdomains