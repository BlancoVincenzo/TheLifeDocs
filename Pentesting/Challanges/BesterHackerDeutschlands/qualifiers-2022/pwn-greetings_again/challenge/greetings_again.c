#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <string.h>

void debug(void);
void greetings(void);

int main() {
   	debug();
   	greetings();
   	greetings();
   	printf("Gruessen beendet.\n");
   	return 0;
}

void debug(void){
	printf("Debug-Ausgaben:\n");
	printf("scanf: %p\n", scanf);
	printf("printf: %p\n", printf);
	printf("greetings: %p\n", greetings);
}

void greetings(void){
	char input[200];
	printf("Wer soll diesmal gegruesst werden?\n");
	scanf("%s", &input);
	printf("Schoene Gruesse an ");
	printf(input);
	printf("!\n");
}
