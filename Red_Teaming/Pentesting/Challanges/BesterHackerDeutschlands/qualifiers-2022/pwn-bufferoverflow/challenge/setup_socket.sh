#gcc greetings.c -o greetings -fno-stack-protector -z execstack -no-pie
socat TCP-LISTEN:57005,nodelay,reuseaddr,fork EXEC:"stdbuf -i0 -o0 -e0 ./greetings"
