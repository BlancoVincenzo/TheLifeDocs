# Fingerprinting

- extracting technical details (infrastrucutre, potential security weaknesses)

Listing all Tecchnologies used in Web-Applications

- Identifying Misconfigured / Outdated Software

- Identyfing more vulnerable systems

## Fingerprinting Techniques

- **Banner Grabbing** reveal server software, verision numbers, other details

- **Headers** like **X-Powered-By** revealing Scripting languages etc. 

- **Revealing Specific Responses** Error Messages

- **Analysing Web-Content** | Structure, Scripts

| Tool        | Description                                                  | Features                                                                 |
|-------------|--------------------------------------------------------------|--------------------------------------------------------------------------|
| Wappalyzer  | Browser extension and online service for website technology profiling. | Identifies a wide range of web technologies, including CMSs, frameworks, analytics tools, and more. |
| BuiltWith   | Web technology profiler that provides detailed reports on a website's technology stack. | Offers both free and paid plans with varying levels of detail.           |
| WhatWeb     | Command-line tool for website fingerprinting.                | Uses a vast database of signatures to identify various web technologies. |
| Nmap        | Versatile network scanner for various reconnaissance tasks, including service and OS fingerprinting. | Can be used with scripts (NSE) to perform more specialised fingerprinting. |
| Netcraft    | Offers web security services, including website fingerprinting and security reporting. | Provides detailed reports on a website's technology, hosting provider, and security posture. |
| wafw00f     | Command-line tool designed for identifying Web Application Firewalls (WAFs). | Helps determine if a WAF is present and, if so, its type and configuration. |

### Grabbing the Header with curl 

curl -I "domain name"

### Web Application Firewall detection (WAFs)

Detect WAF with wafw00f

wafwoof "domain-name"