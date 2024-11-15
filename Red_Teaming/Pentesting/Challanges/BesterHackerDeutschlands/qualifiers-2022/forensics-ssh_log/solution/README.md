# forensiscs_ssh_log

## Lösungsvorschlag

Der Name der Datei und der Name der Challenge legen nahe, dass die Datei eine Log-Datei 
eines SSH-Dienstes ist.

Ein Blick in die Datei bestätigt dies:

```console
$ tail auth.log 
Jul  3 20:41:24 user-virtual-machine sshd[32682]: pam_unix(sshd:auth): authentication failure; logname= uid=0 euid=0 tty=ssh ruser= rhost=192.168.241.147 
Jul  3 20:41:27 user-virtual-machine sshd[32682]: Failed password for invalid user _f7w from 192.168.241.147 port 43532 ssh2
Jul  3 20:41:27 user-virtual-machine sshd[32682]: message repeated 2 times: [ Failed password for invalid user _f7w from 192.168.241.147 port 43532 ssh2]
Jul  3 20:41:27 user-virtual-machine sshd[32682]: Connection closed by invalid user _f7w 192.168.241.147 port 43532 [preauth]
Jul  3 20:41:27 user-virtual-machine sshd[32684]: Invalid user } from 192.168.241.147 port 43534
Jul  3 20:41:27 user-virtual-machine sshd[32684]: pam_unix(sshd:auth): check pass; user unknown
Jul  3 20:41:27 user-virtual-machine sshd[32684]: pam_unix(sshd:auth): authentication failure; logname= uid=0 euid=0 tty=ssh ruser= rhost=192.168.241.147 
Jul  3 20:41:29 user-virtual-machine sshd[32684]: Failed password for invalid user } from 192.168.241.147 port 43534 ssh2
Jul  3 20:41:31 user-virtual-machine sshd[32684]: message repeated 2 times: [ Failed password for invalid user } from 192.168.241.147 port 43534 ssh2]
Jul  3 20:41:31 user-virtual-machine sshd[32684]: Connection closed by invalid user } 192.168.241.147 port 43534 [preauth]
```

Fehlerhafte Anmeldeversuche, bei denen das verwendete Kennwort nicht korrekt ist, werden in den Logs mit "Failed password" protokolliert:
```console
$ cat auth.log | grep "Failed password"
Jul  3 20:41:04 user-virtual-machine sshd[32663]: Failed password for invalid user DBH from 192.168.241.147 port 43514 ssh2
Jul  3 20:41:04 user-virtual-machine sshd[32663]: message repeated 2 times: [ Failed password for invalid user DBH from 192.168.241.147 port 43514 ssh2]
Jul  3 20:41:06 user-virtual-machine sshd[32665]: Failed password for invalid user zwischen from 192.168.241.147 port 43516 ssh2
Jul  3 20:41:07 user-virtual-machine sshd[32665]: message repeated 2 times: [ Failed password for invalid user zwischen from 192.168.241.147 port 43516 ssh2]
Jul  3 20:41:09 user-virtual-machine sshd[32667]: Failed password for invalid user {bru73 from 192.168.241.147 port 43520 ssh2
Jul  3 20:41:10 user-virtual-machine sshd[32667]: message repeated 2 times: [ Failed password for invalid user {bru73 from 192.168.241.147 port 43520 ssh2]
Jul  3 20:41:12 user-virtual-machine sshd[32669]: Failed password for invalid user den from 192.168.241.147 port 43522 ssh2
Jul  3 20:41:12 user-virtual-machine sshd[32669]: message repeated 2 times: [ Failed password for invalid user den from 192.168.241.147 port 43522 ssh2]
Jul  3 20:41:14 user-virtual-machine sshd[32674]: Failed password for invalid user _f0rc3 from 192.168.241.147 port 43524 ssh2
Jul  3 20:41:15 user-virtual-machine sshd[32674]: message repeated 2 times: [ Failed password for invalid user _f0rc3 from 192.168.241.147 port 43524 ssh2]
Jul  3 20:41:17 user-virtual-machine sshd[32676]: Failed password for invalid user Zeilen from 192.168.241.147 port 43526 ssh2
Jul  3 20:41:17 user-virtual-machine sshd[32676]: message repeated 2 times: [ Failed password for invalid user Zeilen from 192.168.241.147 port 43526 ssh2]
Jul  3 20:41:19 user-virtual-machine sshd[32678]: Failed password for invalid user _4774ck5 from 192.168.241.147 port 43528 ssh2
Jul  3 20:41:21 user-virtual-machine sshd[32678]: message repeated 2 times: [ Failed password for invalid user _4774ck5 from 192.168.241.147 port 43528 ssh2]
Jul  3 20:41:23 user-virtual-machine sshd[32680]: Failed password for invalid user lesen from 192.168.241.147 port 43530 ssh2
Jul  3 20:41:24 user-virtual-machine sshd[32680]: message repeated 2 times: [ Failed password for invalid user lesen from 192.168.241.147 port 43530 ssh2]
Jul  3 20:41:27 user-virtual-machine sshd[32682]: Failed password for invalid user _f7w from 192.168.241.147 port 43532 ssh2
Jul  3 20:41:27 user-virtual-machine sshd[32682]: message repeated 2 times: [ Failed password for invalid user _f7w from 192.168.241.147 port 43532 ssh2]
Jul  3 20:41:29 user-virtual-machine sshd[32684]: Failed password for invalid user } from 192.168.241.147 port 43534 ssh2
Jul  3 20:41:31 user-virtual-machine sshd[32684]: message repeated 2 times: [ Failed password for invalid user } from 192.168.241.147 port 43534 ssh2]
```
Werden die verwendeten Usernamen untereinander aufgelistet, kann die Flag erkannt werden:
```text
DBH
zwischen
{bru73
den
_f0rc3
Zeilen
_4774ck5
lesen
_f7w
}
```

## Beseitigung der Schwachstelle
Da diese Aufgabe aus dem Bereich der Forensik stammt, gibt es hier keinen Vorschlag zur Beseitigung der Schwachstelle.

## Flag
```
DBH{bru73_f0rc3_4774ck5_f7w}
```
