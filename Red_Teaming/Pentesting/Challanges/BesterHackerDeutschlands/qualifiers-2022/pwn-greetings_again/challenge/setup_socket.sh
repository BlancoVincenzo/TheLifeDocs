socat TCP-LISTEN:4004,nodelay,reuseaddr,fork EXEC:"stdbuf -i0 -o0 -e0 /home/dbh/greetings_again"
