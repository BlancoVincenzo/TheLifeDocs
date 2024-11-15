# Deutschlands Bester Hacker - Qualifiers 2022

![Logo](https://deutschlands-bester-hacker.de/wp-content/uploads/2022/02/DBH_Logo_2022_new.png)

Hier findet ihr die Aufgaben der Qualifiers von DBH 2022.

### Was wird benötigt?

Manche Challenges benötigen Docker um sie zu lösen. Um Docker zu installieren, folge bitte den Anweisungen auf der [Docker-Website](https://docs.docker.com/get-docker/).

Zudem ist eine Kali VM oder ein Linux System hilfreich, da viele Tools bei Kali Linux bereits vorinstalliert sind.

### Wie sind die Ordner strukturiert?

Jede Challenge ist ein eigener Ordner.
Das Namensschema ist `<kategorie>-<name_challenge>`.
Die Kategorie gibt an, welche Fähigkeiten helfen, um die Challenge zu lösen. So steht zum Beispiel  `web-dustbust` für die Web-Challenge dustbust.
Weiteres zu CTFs und Kategorien findest du [hier](https://fareedfauzi.gitbook.io/ctf-checklist-for-beginner/).

Die Struktur der einzelnen Ordner ist wie folgt:
```
<kategorie>-<name_challenge>
    - challenge
        - challenge.txt
        - <daten_challenge>
    - solution
        - README.md
        - <daten_solution>
```

Im Ordner `challenge` sind alle Daten, die auch bei dem Qualifier den User bereit gestellt wurden oder zum starten der Challenge notwendig sind (Dockerfile).
`challenge.txt` ist die Beschreibung der Challenge aus dem Qualifiers.
Im Ordner `solution` sind alle Daten zu eigenen Lösungsvorschlägen der Challenges.
Die Datei `README.md` ist hierbei die Hauptdokumentation.

#### Wie starte ich Challenges?

Lade dir das Repository herunter und navigiere in den Ordner der Challenge. Dort findest du die Unter-Ordner `challenge` und `solution`. Gehe nun in den Ordner `challenge`, falls hier keine `Dockerfile` enthalten ist muss die Challenge nicht in einem Container ausgeführt werden.

Ansonsten kannst du die Challenge mit folgendem Befehl bauen:
```console
docker build --no-cache -t <name_docker> . 
```

Mit folgendem Befehl wird der Docker / die Challenge gestartet.
```console
docker run -p <port>:<port> -d <name_docker>
```

`<name_docker>` ist der frei wählbare Name des Containers
`<port>` ist der Port der Challenge, der üblicherweise in Dateien wie `challenge.txt` oder `setup_socket.sh` zu finden ist.

Nun kann man sich via Localhost und `<port>` mit der Challenge z.B. via Browser oder Netcat verbinden.

Verbinden via Netcat:
```
nc localhost <port>
```

Die Docker-Images wurden mit einem stable Kali getestet.

#### Wo finde ich die Challenges aus dem Finale / Bootcamp?
Diese Challenges sind veranstaltungsexklusiv und werden nicht veröffentlicht.

#### Wann findet DBH 2023 statt?
**Qualifiers:** 05. Juli - 17. August 2023\
**Bootcamp:** September 2023 (genaues Datum folgt)\
Weitere Infos gibt es auf der [Webseite](https://deutschlands-bester-hacker.de/).

#### Kontakt / Fragen
Gerne im [Discord](https://discord.gg/emdHhEqx6S).
