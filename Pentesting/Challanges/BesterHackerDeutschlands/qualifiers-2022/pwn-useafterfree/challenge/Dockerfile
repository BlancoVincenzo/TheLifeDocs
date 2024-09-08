FROM python:3.8

#Copying challenge files
ADD ich_mag_busse .
ADD flag.txt .
ADD setup_socket.sh .

RUN apt update
RUN apt install socat -y


CMD ["/bin/sh", "./setup_socket.sh"]