# What is a DNS Zone Transfer? 

A copy of all DNS records within a zone (domain + all sudomains)

Transfered from one-server to another server

If not properly secured, unauthorized parties can download Zone-File (listing all subdomains, IP-Addresses, sensitive DNS-Data)

## How does an Zone-Transfer work? 

AXFR Reqeuest (Zone Transfer) to server with Records

Record-Server validates request Server --> Response with SAO (Start of Authority) record.

SOA contains zone infos like serial numbers.

After SAO; Record Server sends all DNS-Entries via loop to Receiver

After Zone Transfer Completed the Record-Server sends Zone Transfer Completed

Receiver sends ACK. Zone Transfer completed

## Zone Transfer Vulnerability

- misconfigured DNS-Server --> unauthorized server can may initated zone-transfer

- DNS-Servers today only allow Zone-Transfer Request to trusted secondary servers 

### Using dig for Zone-Transfer request

- dig for reqeust a zone-transfer (AXFR) reqeust

dig @ns1.example.com example.com axfr

dig axfr inlanefreight.htb @10.129.105.116
