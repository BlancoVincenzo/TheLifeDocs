FROM python:3.8

ADD greetings .
ADD flag.txt .
ADD setup_socket.sh .

RUN echo 'We are doing some things'
RUN apt update
RUN apt install socat -y


CMD ["/bin/sh", "./setup_socket.sh"]