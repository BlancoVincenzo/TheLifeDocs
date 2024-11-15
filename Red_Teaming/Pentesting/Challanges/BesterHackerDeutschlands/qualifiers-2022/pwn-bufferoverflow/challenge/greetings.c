#include <stdio.h>
#include <stdlib.h>

#define TRUE 1 

void gruss() {
    //Kein Teilnehmer wird einen Namen mit mehr als 64 Buchstaben haben
    char name_user[64] = {'\0'};
    printf("Wie heisst du?:\n");
    gets(name_user);
    printf("Hallo %s. Viel Spass bei DBH!\n", name_user);
}

void spass() {
    printf("So macht DBH doch viel mehr Spass.\n");
    char* args[3] = {"/bin/cat", "./flag.txt", NULL};
    execve(args[0], args, NULL);
}

int main(int argc, char* argv[]) {
    gruss();
}