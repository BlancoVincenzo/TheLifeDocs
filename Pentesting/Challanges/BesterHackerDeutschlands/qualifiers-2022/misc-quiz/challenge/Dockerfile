FROM python:3.8

ADD game.py .
ADD flag.txt .
ADD setup_socket.sh .

RUN apt update
RUN apt install socat -y

CMD ["/bin/sh", "./setup_socket.sh"]
