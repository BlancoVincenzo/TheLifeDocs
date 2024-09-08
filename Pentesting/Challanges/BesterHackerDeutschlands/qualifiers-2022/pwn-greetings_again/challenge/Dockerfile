FROM python:3.8



RUN useradd -m -d /home/dbh dbh


ADD greetings_again /home/dbh/

ADD flag.txt /home/dbh/

ADD setup_socket.sh /home/dbh



RUN apt-get update -q

RUN apt-get install socat -y -q



RUN chmod 005 /home/dbh/setup_socket.sh
RUN chmod 005 /home/dbh/greetings_again
RUN chmod 004 /home/dbh/flag.txt

CMD ["su", "-", "dbh", "-c", "/home/dbh/setup_socket.sh"]