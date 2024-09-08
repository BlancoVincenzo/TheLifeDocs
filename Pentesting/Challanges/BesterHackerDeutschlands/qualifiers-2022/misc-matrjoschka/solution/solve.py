import re
import binascii
import base64
import morse_talk as morse


def isFlag(checkString):
    try:
        return "DBH" in checkString
        if re.compile("^[kK][eE][yY]={.+}$").match(checkString):
            return True
        else:
            return False
    except:
        return False


def isMorse(checkString):
    try:
        if re.compile("^[ \.-]+$").match(checkString):
            return True
        else:
            return False
    except:
        return False


def isHex(checkString):
    try:
        int(checkString, 16)
        return True
    except:
        return False


startString = open('output.txt', 'r').read()
workString = startString
for i in range(100):  # 100 iterations maximum
    # print(workString)
    if isFlag(workString):  # checks if it matches the key regex
        break
    i = i+1
    if isMorse(workString):
        # print(f"{i} > Morse")
        print(f"> Morse")
        # encode text to morse
        #workString = workString.decode("utf-8")
        workString = morse.decode(workString)
        #workString = workString.decode("utf-8")
    elif isHex(workString):
        # decode the string from hex
        # print(f"{i} > Hex")
        print(f"> Hex")
        workString = workString.replace(" ", "")
        workString = workString.encode("utf-8")
        workString = binascii.unhexlify(workString)
        workString = workString.decode("utf-8")
    else:
        # decode the string from base64
        # print(f"{i} > Base64")
        print(f"> Base64")
        workString = workString.encode("utf-8")
        workString = base64.b64decode(workString)
        workString = workString.decode("utf-8")

print(workString)
