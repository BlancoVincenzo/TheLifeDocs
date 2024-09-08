import random
from sqlite3 import connect
from datetime import datetime
import sys
import codecs
import base64
import binascii

PATH_FLAG = "./flag.txt"
TIME_GAME_SECONDS = 20
MAX__NUMBER_RANGE = 5

#TODO: Wordlist erweitern
WORDLIST = ['anders', 'gleich', 'Stromverteiler', 'Standortverlegung', 'Produzententeam', 'Schlittschuhe', 'Klavierunterricht', 'Felsgestein', 'Zuschauereinnahme', 'rispig', 'verwehren', 'Ebner', 'Rechtsaufsicht', 'Wahllokal', 'Schauplatz', 'Kienzapfen', 'Masur', 'Eisenschimmel', 'Xantener', 'Nachwuchssorgen', 'bequemlich', 'Marzipankartoffel', 'zehnseitig', 'heranstehen', 'Gaumen', 'Pressepolemik', 'Peitsche', 'Bronchoskopie', 'abgasarm', 'Mehrkaempferin', 'Grenze', 'herzeigbar', 'Quartaner', 'apothekenpflichtig', 'Gesundheitsfuersorge', 'Stadtsoziologe', 'Sommermonat', 'Auffuehrungsdauer', 'Stuerzen', 'Rettungswesen', 'untergehen', 'entwickelnden', 'Gesundheitslage', 'Waehrungsgewinn', 'Tribus', 'entfremdet', 'Glienicke', 'mitentwickelt', 'Loeffelstiel', 'strebend', 'fegen', 'ueberdreht', 'einschlaegig', 'Freitag', 'Montag', 'Der', 'insgesamt', 'bezeichnet', 'zur', 'zweiten', 'Medien', 'Tageszeitung', 'Maus', 'Elefant', 'Dinosaurier', 'Paris', 'Berlin', 'Bamberg']
SCHIRMHERRIN = "Judith Gerlach"
#Mit 100x DBH wird sichergestellt, dass dies lang genug ist
KEY = 'DBH' * 100

BANNER = '''
 ______   ______   ____  ____     ___   _____  _____  _____  ________  
|_   _ `.|_   _ \ |_   ||   _|  .'   `.|_   _||_   _||_   _||  __   _| 
  | | `. \ | |_) |  | |__| |   /  .-.  \ | |    | |    | |  |_/  / /   
  | |  | | |  __'.  |  __  |   | |   | | | '    ' |    | |     .'.' _  
 _| |_.' /_| |__) |_| |  | |_  \  `-'  \_ \ \__/ /    _| |_  _/ /__/ | 
|______.'|_______/|____||____|  `.___.\__| `.__.'    |_____||________| 
'''

def game():
    begruessung()

    start_timestamp_seconds = datetime.now() #int(round(time.time() * 1000 * 1000))

    #Summe berechnen
    zahlen = range(1, MAX__NUMBER_RANGE)
    summand_1 = random.choice(zahlen)
    summand_2 = random.choice(zahlen)
    ergebnis = summand_1 + summand_2
    frage_str = 'Wir starten einfach. Wie viel ist "%d+%d"?: ' % (summand_1, summand_2)
    if not frage(frage_str, str(ergebnis)):
        finish()
        sys.exit()
    if not check_time(start_timestamp_seconds):
        sys.exit()
    
    #S-t-r-i-n-g normalisieren
    ergebnis = random.choice(WORDLIST)
    frage_str = '-'.join(ergebnis[i:i+1] for i in range(0, len(ergebnis), 1))
    frage_str = "Weiter gehts mit dem Normalisieren des Wortes %s: " % frage_str 
    if not frage(frage_str, ergebnis):
        finish()
        sys.exit()
    if not check_time(start_timestamp_seconds):
        sys.exit()

    #ROT13 entschluesseln
    ergebnis = random.choice(WORDLIST)
    frage_str = codecs.encode(ergebnis, 'rot_13')
    frage_str = "Bitte entschluessel den mit ROT13 verschluesselten Text: %s: " % frage_str 
    if not frage(frage_str, ergebnis):
        finish()
        sys.exit()
    if not check_time(start_timestamp_seconds):
        sys.exit()

    #Base64 decode
    ergebnis = random.choice(WORDLIST)  
    ergebnis_bytes = ergebnis.encode('ascii')
    frage_bytes = base64.b64encode(ergebnis_bytes)
    frage_str = frage_bytes.decode('ascii')
    frage_str = "Bitte dekodiere den Base64-enkodierten Text: %s: " % frage_str 
    if not frage(frage_str, ergebnis):
        finish()
        sys.exit()
    if not check_time(start_timestamp_seconds):
        sys.exit()
    
    #Von Hex nach ASCII
    ergebnis = random.choice(WORDLIST)  
    ergebnis_bytes = ergebnis.encode('ascii')
    frage_bytes = binascii.hexlify(ergebnis_bytes)
    frage_str = frage_bytes.decode('ascii')
    frage_str = "0x" + frage_str
    frage_str = "Bitte dekodiere den hexadezimal-enkodierten Text: %s: " % frage_str 
    if not frage(frage_str, ergebnis):
        finish()
        sys.exit()
    if not check_time(start_timestamp_seconds):
        sys.exit()

    #Base10 zu Binaer
    rand_int = random.randint(10000,99999)
    ergebnis = str(rand_int)
    frage_str = bin(int(ergebnis)).replace("0b", "")
    frage_str = "Ermittel die Zahl (dezimal): %s: " % frage_str 
    if not frage(frage_str, ergebnis):
        finish()
        sys.exit()
    if not check_time(start_timestamp_seconds):
        sys.exit()

    #XOR zu ASCII
    frage_str = random.choice(WORDLIST)
    len_ergebnis = len(frage_str)
    key_gekuerzt = KEY[0:len_ergebnis]
    print(key_gekuerzt)
    ergebnis = ''.join(chr(ord(a) ^ ord(b)) for a,b in zip(frage_str,key_gekuerzt))
    frage_str = "VerXORe %s mit %s:" % (key_gekuerzt, frage_str) 
    if not frage(frage_str, ergebnis):
        finish()
        sys.exit()
    if not check_time(start_timestamp_seconds):
        sys.exit()  

    #Schirmherrin von DBH
    ergebnis = SCHIRMHERRIN
    frage_str = "Wie heisst die Schirmherrin von Deutschlands Bester Hacker?" 
    if not frage(frage_str, ergebnis):
        finish()
        sys.exit()
    if not check_time(start_timestamp_seconds):
        sys.exit()

    #Print Flag
    print_flag()    

def check_time(start_timestamp_seconds):
    current_time = datetime.now() #int(round(time.time() * 1000 * 1000))
    time_diff = current_time - start_timestamp_seconds
    time_diff = int(time_diff.total_seconds())
    #print("time_dif = ", time_diff)
    if time_diff > TIME_GAME_SECONDS:
        print("Schade! Die Zeit abgelaufen.\n")
        finish()
        return False
    return True

def begruessung():
    print(BANNER)
    print("Willkommen beim DBH Quiz.")
    print("######################################")
    print("Die Regeln sind einfach: Beantworte alle Fragen innerhalb von %d Sekunden" % TIME_GAME_SECONDS)
    print("und erhalte die Flagge. Viel Erfolg!")
    print("######################################")

def frage(frage, loesung):
    print(frage)
    try:
        user_input = input()
    except Exception as e:
        exception_digits()
    if user_input == loesung:
        print("Korrekt.\n")
        return True
    
    print("Falsch.\n")
    return False

def exception_digits():
    print("Fehler bei Eingabe. Bitte nur Zahlen eingeben.")
    finish()

def timeout():
    print("Zeit abgelaufen\n")
    finish()

def finish():
    print("Spiel erfolglos beendet. Bitte versuche es erneut.")

def print_flag():
    print("Glueckwunsch, hier ist die Flagge. Viel Spass damit:\n")
    with open(PATH_FLAG, 'r') as f:
        flag = f.read()
        print(flag)

if __name__ == '__main__':
    game()