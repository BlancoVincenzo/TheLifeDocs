from Cryptodome.Cipher import AES
#From: ttps://stackoverflow.com/questions/70705404/systemerror-py-ssize-t-clean-macro-must-be-defined-for-formats

#16 Bytes means AES-128
KEY = "dbh_key_ke8rt04u"
BLOCK_SIZE_BYTES = 16
PATH_ENCRYPTED_FILE = "./flag.txt.dbh"


def get_cipher_text():
	print("Getting cipher text...")
	file = open(PATH_ENCRYPTED_FILE,mode='rb')
	# read all lines at once
	all_of_it = file.read()
	#Remove first character
	#all_of_it = all_of_it[1:]
	# close the file
	file.close()
	
	return all_of_it#.encode("utf8")

def main():
	print("Loading cipher...")
	print("Key length: %d" % len(KEY))
	decipher = AES.new(KEY.encode("utf8"), AES.MODE_ECB)
	cipher_text = get_cipher_text()
	print("Length text %d " % len(cipher_text))
	print("Printing cipher text...")
	print(cipher_text.hex())
	print("Printing plain text...")
	print(decipher.decrypt(cipher_text))

if __name__ == '__main__':
	print("Hallo Welt")
	main()
