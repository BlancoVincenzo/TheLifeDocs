socat TCP-LISTEN:54321,nodelay,reuseaddr,fork EXEC:"stdbuf -i0 -o0 -e0 ./ich_mag_busse"
