# Secure Socket Layer (SSL) / Transport Layer Security (TLS)

- digital certificate in the core

Attacker can exploit rouge or misissued certificates 
- website impersonateing 
- intercept sensitive data
- spread maleware

--> CT - Certificate Transparency Logs needed
"Global registery of certificate logs" 

When Certificate Authority issues ne certificate, it must be submitted to the CT log
--> anyone can inspect


## Rouge certificate 

- unauthorized / fraudulent certificate can be detected through CT early

## Accaountability for CA

- CAs violations are logged <--> leading to sanctions / loss of trust

## Web Public Key Infrastructure (PKI)

CT logs enhance security / integrity of WEB PKI by having mechanism of public availability and verifiaction of certificates


# CT Logs

Website Owner requests SSL/TLS certificate --> CA proofs the domain ownership and generates a **pre-certificate**

CA pushes the **pre-certificate** on CT logs which are redundant and decentralized

CTLogs are append-only; no editing is possible (integrity / historical record given)

CT-Log generates **(SCT) Signed Certificate Timestamp** --> cryptographic proof of pusing the pre-certificate onto the log
later added to the real certificate

When user enters Website the SCT (Signed Certificate Timestamp) gets proofen against the CT logs 

CT logs are monitored continously by researchers, browsers vendors etc. 

Suspicous coud be 
- issuing certificate for domains they not own
- suspicious certificates violating industry standards

### Merkle Tree

Certificates are proofed through the Merkle Tree Meachnism providign the Merkle Tree to the Root-Hash

CT logs are therfore having high integrity

### Tools for Looking up Certificate Transparency Logs

| Tool    | Key Features                                                                 | Use Cases                                                 | Pros                                         | Cons                                       |
|---------|----------------------------------------------------------------------------|----------------------------------------------------------|---------------------------------------------|--------------------------------------------|
| crt.sh  | User-friendly web interface, simple search by domain, displays certificate details, SAN entries. | Quick and easy searches, identifying subdomains, checking certificate issuance history. | Free, easy to use, no registration required. | Limited filtering and analysis options.   |
| Censys  | Powerful search engine for internet-connected devices, advanced filtering by domain, IP, certificate attributes. | In-depth analysis of certificates, identifying misconfigurations, finding related certificates and hosts. | Extensive data and filtering options, API access. | Requires registration (free tier available). |


 curl -s "https://crt.sh/?q=facebook.com&output=json" | jq -r '.[]
 | select(.name_value | contains("dev")) | .name_value' | sort -u
