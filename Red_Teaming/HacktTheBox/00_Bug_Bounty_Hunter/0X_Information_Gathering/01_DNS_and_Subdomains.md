# Leveraging DNS for Web Reconnaisannce

## Tools for DNS Scans
| Tool                      | Key Features                                                                                  | Use Cases                                                                                           |
|---------------------------|-----------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------|
| **dig**                   | Versatile DNS lookup tool that supports various query types (A, MX, NS, TXT, etc.) and detailed output. | Manual DNS queries, zone transfers (if allowed), troubleshooting DNS issues, and in-depth analysis of DNS records. |
| **nslookup**              | Simpler DNS lookup tool, primarily for A, AAAA, and MX records.                              | Basic DNS queries, quick checks of domain resolution and mail server records.                       |
| **host**                  | Streamlined DNS lookup tool with concise output.                                              | Quick checks of A, AAAA, and MX records.                                                           |
| **dnsenum**               | Automated DNS enumeration tool, dictionary attacks, brute-forcing, zone transfers (if allowed). | Discovering subdomains and gathering DNS information efficiently.                                   |
| **fierce**                | DNS reconnaissance and subdomain enumeration tool with recursive search and wildcard detection. | User-friendly interface for DNS reconnaissance, identifying subdomains and potential targets.       |
| **dnsrecon**              | Combines multiple DNS reconnaissance techniques and supports various output formats.          | Comprehensive DNS enumeration, identifying subdomains, and gathering DNS records for further analysis. |
| **theHarvester**          | OSINT tool that gathers information from various sources, including DNS records (email addresses). | Collecting email addresses, employee information, and other data associated with a domain from multiple sources. |
| **Online DNS Lookup Services** | User-friendly interfaces for performing DNS lookups.                                         | Quick and easy DNS lookups, convenient when command-line tools are not available, checking for domain availability or basic information. |

### DIG - The domain Information Gropper

#### Common DIG Commands

| Command                        | Description                                                                                       |
|--------------------------------|---------------------------------------------------------------------------------------------------|
| `dig domain.com`               | Performs a default A record lookup for the domain.                                               |
| `dig domain.com A`             | Retrieves the IPv4 address (A record) associated with the domain.                                |
| `dig domain.com AAAA`          | Retrieves the IPv6 address (AAAA record) associated with the domain.                             |
| `dig domain.com MX`            | Finds the mail servers (MX records) responsible for the domain.                                  |
| `dig domain.com NS`            | Identifies the authoritative name servers for the domain.                                        |
| `dig domain.com TXT`           | Retrieves any TXT records associated with the domain.                                            |
| `dig domain.com CNAME`         | Retrieves the canonical name (CNAME) record for the domain.                                      |
| `dig domain.com SOA`           | Retrieves the start of authority (SOA) record for the domain.                                    |
| `dig @1.1.1.1 domain.com`      | Specifies a specific name server to query; in this case `1.1.1.1`.                               |
| `dig +trace domain.com`        | Shows the full path of DNS resolution.                                                           |
| `dig -x 192.168.1.1`           | Performs a reverse lookup on the IP address `192.168.1.1` to find the associated hostname.       |
| `dig +short domain.com`        | Provides a short, concise answer to the query.                                                   |
| `dig +noall +answer domain.com`| Displays only the answer section of the query output.                                            |
| `dig domain.com ANY`           | Retrieves all available DNS records for the domain. (Note: Many DNS servers ignore ANY queries.) |

**Caution:** Some servers can detect and block excessive DNS queries. Use caution and respect rate limits. Always obtain permission before performing extensive DNS reconnaissance on a target.
