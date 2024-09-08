from hashlib import md5
from Cryptodome.Cipher import AES
from os import urandom
import binascii
import sys
import platform
import os
from datetime import datetime
from pytz import timezone

def decrypt(in_file, out_file, password, key_length=16):
    bs = AES.block_size
    key = binascii.unhexlify(password)
    cipher = AES.new(key, AES.MODE_ECB)
    next_chunk = ''
    finished = False
    success = False  
    
    while not finished:
        chunk, next_chunk = next_chunk, cipher.decrypt(in_file.read(1024 * bs))
        if len(next_chunk) == 0:
            padding_length = chunk[-1]
            chunk = chunk[:-padding_length]
            finished = True 
            if (chunk.find(b"DBH") == 0):
                out_file.write(bytes(x for x in chunk)) 
                success = True
    
    return success

    
def key_gen(x):
    timestamp = datetime.fromtimestamp(get_timestamp()).astimezone(timezone('CET')).strftime("%d-%m-%Y %H:%M:%S").encode('utf-8')
    md5_timestamp = md5(timestamp)
    md5_rand = md5(str(x).encode('utf-8'))
    
    key = ""
    for y in range(32):
        if (y%2==0):
            key = key + md5_rand.hexdigest()[y]
        else:
            key = key + md5_timestamp.hexdigest()[y]
    return key
    

def get_timestamp():
    path_to_file = sys.argv[1]
    return os.path.getmtime(path_to_file)
    


path_to_file = sys.argv[1]
print("Bruteforcing Key...")
for x in range(10000):
    password = str(key_gen(x))
    with open(path_to_file, 'rb') as in_file, open(path_to_file + ".txt", 'wb') as out_file:
        if (decrypt(in_file, out_file, password) == True):
            print("\n\nFound Key: " + password)
            print("Decrypted File: " + path_to_file + ".txt\n")
            break
        

    
#pip install pycryptodomex
