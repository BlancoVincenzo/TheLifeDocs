# misc-matrjoschka

## Lösungsvorschlag

Die Datei der Challenge ist ein Archiv.

```console
unzip output.txt.zip
.rw-r--r--   124 user 16 Aug 11:23 -- challenge.txt
.rw-r--r-- 358Ki user 16 Aug 11:23 -- output.txt.zip
Archive:  output.txt.zip
  inflating: output.txt
```

Der Output `output.txt` ist jedoch ein Base64 kodierter String. Dekodiert man den String ein paar mal, so fällt auf, dass verschiedene Verfahren zur Kodierung verwendet wurden:
-   Base64
-   Hex
-   Morse code

Da manuelles dekodieren zu nervig ist, kann man das Dekodieren mittels des Skriptes `solve.py` lösen.
Das Skript endet, sobald der String den Sub-String `"DBH"` enthält.

```console
﬌ python3 ./solve.py
> Base64
> Hex
> Hex
> Base64
> Hex
> Hex
> Base64
> Hex
> Base64
> Base64
> Base64
> Base64
> Hex
> Hex
> Morse
> Hex
> Base64
> Base64
> Hex
> Hex
> Base64
flag=DBH{35_61b7_1mm3r_31n3_4nd3r3_d4731}
```

Nun einfach Flag abgeben.

## Beseitigung der Schwachstelle

Da diese Aufgabe aus dem Bereich miscellaneous stammt, gibt es hier keinen Vorschlag zur Beseitigung der Schwachstelle.

## Flagge
```
DBH{35_61b7_1mm3r_31n3_4nd3r3_d4731}
```

## Basierend auf / Inspiriert von
Ähnliche Aufgaben gibt / gab es bei anderen CTFs (z.B. [DUCTF](https://downunderctf.com/)) 