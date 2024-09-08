#include<stdio.h>
#include <stdlib.h> 

#define FALSE 0
#define TRUE 1 

int check_key(char *key);
void print_flag();

int main() {
    char name[20];
	printf("Bitte gib Key ein\n");
    fgets(name,20,stdin);
    printf("Input: %s\n", name);
    if(check_key(name) == FALSE){
        printf("Falsche Eingabe.\n");
        return 1;
    }
    printf("Korrekte Eingabe.\n");
    print_flag();
    return 0;
}

void print_flag() {
    FILE *fptr;
  
    char c;

    fptr = fopen("./flag.txt", "r");
    if (fptr == NULL)
    {
        printf("Datei konnte nicht geoeffnet werden.\n");
        exit(0);
    }
  
    // Read contents from file
    c = fgetc(fptr);
    while (c != EOF)
    {
        printf ("%c", c);
        c = fgetc(fptr);
    }
  
    fclose(fptr);
}

int check_key(char *key){
    char line = '-';
    if (key[4] != line)
        return FALSE;
    if (key[9] != line)
        return FALSE;
    if (key[15] != line)
        return FALSE;

    if (key[0] != key[7])
        return FALSE;
    if (key[12] != key[8])
        return FALSE;
    
    if (key[3] != 'M')
        return FALSE;
    if (key[12] != 'G')
        return FALSE;
    if (key[18] != 'Z')
        return FALSE;

    //Einmal XOR mit zwei nicht festgelegen 15
    if((key[10] ^ key[5]) != 1)
        return FALSE;
    //Einmal XOR mit mid einem festgelegten 11
    if((key[7] ^ key[1]) != 35){
        return FALSE;
    }

    return TRUE;

}