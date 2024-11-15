parts = [
"Stefan",
"Steps",
"Schneider",
"Reise",
"Charlie",
"Berlin",
"Kreuzberg",
"Vulkane",
"Geologie",
"Teutoburger",
"Wald",
]

for part1 in parts:
    for part2 in parts:
        password = part1 + part2
        if len(password) != 18:
            continue
        else:
            print(password)