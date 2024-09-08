# misc-scrolling-video

## Lösungsvorschlag

Bei dem bereitgestellten Video (`dings.mov.zip` entpacken) läuft die Flag durch das Bild.
Leider ist jedoch nur ein kleiner Ausschnitt zu sehen, sodass die Flagge schwer manuell zu erkennen ist.

Zur Lösung kann eine Anwendung verwendet werden, welche die Frames exportiert und diese anschließend so zusammenfügt, dass die Flag erkennbar wird.
Das Skript zur Lösung ist `index.js`.

```bash
# installieren der benötigten Pakete 
npm install
sudo apt install ffmpeg

# und starten des Skripts
node index.js
```

Wichtig ist, dass nur der Bildausschnitt genutzt wird, in dem die Flag erkennbar bzw. sichtbar ist:

```js
let coords = {
    x: 1150,
    y: 400,
    w: 5,
    h: 300
}
imageCut.crop(coords.x, coords.y, coords.w, coords.h)
// hier ist zu beachten, dass die Koordinaten für die Breite und Höhe nicht die des Bildes sind, sondern die des weissen Bereiches
```

Nun wird die Flag als `out.png` ausgegeben:

![Flagge](flag.png)

## Beseitigung der Schwachstelle
Da diese Aufgabe aus dem Bereich miscellaneous stammt, gibt es hier keinen Vorschlag zur Beseitigung der Schwachstelle.

## Flag
```
DBH{W3R_A_S4GT_MU55_4UCH_GU5TAV_S4GEN}
```

## Basierend auf / Inspiriert von
Eine Ähnliche Challenge gab es auf der [hackfu.at](https://hackfu.at/) Austria 2021 im AKW Zwentendorf.