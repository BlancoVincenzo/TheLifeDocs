from pwn import *
import codecs
import base64

TARGET_HOST = "127.0.0.1"
#TARGET_HOST = "20.126.227.19"
TARGET_PORT = 45377

print("Connecting to %s:%d..." % (TARGET_HOST, TARGET_PORT))
process = remote(TARGET_HOST, TARGET_PORT)

#Frage 1: Summe
frage = str(process.recv())
print(frage)
frage = frage.split('"')[1].split('+')
summand_1 = int(frage[0])
summand_2 = int(frage[1])
antwort = summand_1 + summand_2
print("Antwort: %d" % antwort)
process.sendline('%d' % antwort)

#process.sendline(bytes(str(antwort)))

#Frage 2: Normalisieren
frage = str(process.recv())
print(frage)
antwort = frage.split(' ')[-2].replace(':', '').replace('-', '')
print("Antwort: %s" % antwort)
process.sendline(bytes(antwort, 'utf-8'))

#Frage 3: ROT13 entschluesseln
frage = str(process.recv())
print(frage)
antwort = frage.split(' ')[-2].replace(':', '')
antwort = codecs.decode(antwort, 'rot_13')
print("Antwort: %s" % antwort)
process.sendline(bytes(antwort, 'utf-8'))

#Frage 4: Base64 dekodieren
frage = str(process.recv())
print(frage)
antwort = frage.split(' ')[-2].replace(':', '')
antwort_bytes = antwort.encode('ascii')
antwort_bytes = base64.b64decode(antwort_bytes)
antwort = antwort_bytes.decode('ascii')
print("Antwort: %s" % antwort)
process.sendline(bytes(antwort, 'utf-8'))

#Frage 5: Hex nach ASCII
frage = str(process.recv())
print(frage)
antwort = frage.split(' ')[-2].replace(':', '').replace('0x', '')
antwort_bytes = antwort.encode('ascii')
antwort_bytes = binascii.unhexlify(antwort_bytes)
antwort = antwort_bytes.decode('ascii')
print("Antwort: %s" % antwort)
process.sendline(bytes(antwort, 'utf-8'))

#Frage 6: Binaer zu Dezimal
frage = str(process.recv())
print(frage)
antwort = frage.split(' ')[-2].replace(':', '').replace('0x', '')
antwort = int(antwort, 2)
print("Antwort: %s" % antwort)
process.sendline('%d' % antwort)

#Frage 7: XOR
frage = str(process.recv())
print(frage)
key = frage.split(' ')[-3]
antwort = frage.split(' ')[-1]
print(antwort)
antwort = ''.join(chr(ord(a) ^ ord(b)) for a,b in zip(antwort,key))
print("Antwort: %s" % antwort)
process.sendline(bytes(antwort, 'utf-8'))

#Frage 8: Judith Gerlach
frage = str(process.recv())
print(frage)
antwort = "Judith Gerlach"
print("Antwort: %s" % antwort)
process.sendline(bytes(antwort, 'utf-8'))

#Flag
print(str(process.recv()))
