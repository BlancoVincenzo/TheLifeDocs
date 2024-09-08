#include <fcntl.h>
#include <iostream> 
#include <unistd.h>
#include <cstring>
#include <cstdlib>
using namespace std;

class Vehicle{
private:
        virtual void print_flag(){
                char* args[3] = {"/bin/cat", "./flag.txt", NULL};
                execve(args[0], args, NULL);
        }
protected:
        int seats;
        string color;
public:
        virtual void print_stats(){
                cout << "Meine Farbe ist " << color << " und ich habe " << seats << " Sitzplaetze." << endl;
                cout << "-----------------------------------------------" << endl;
        }
};

class Bus: public Vehicle{
public:
        Bus(string color, int seats){
                this->color = color;
                this->seats = seats;
        }
        virtual void print_stats(){
                cout << "Ich bin ein Bus." << endl;
                Vehicle::print_stats();
        }
};

class LKW: public Vehicle{
public:
        LKW(string color, int seats){
                this->color = color;
                this->seats = seats;
        }
        virtual void print_stats(){
                cout << "Ich bin ein LKW." << endl;
                Vehicle::print_stats();
        }
};

int main(int argc, char* argv[]){
        Vehicle* bus = new Bus("blau", 35);
        Vehicle* lkw = new LKW("silber", 2);

        size_t len;
        char* data;
        unsigned int op;
        unsigned int len_stdin;
        while(1){
                cout << "1. Allokieren\n2. Ausgeben\n3. Loeschen\n";
                cin >> op;

                if(op == 1){
                        //Ich bin ein cpp Experte!
                        cin >> len_stdin;
                        data = new char[len_stdin];
                        read(STDIN_FILENO, data, len_stdin);
                        cout << "Daten allokiert" << endl;                        
                } else if(op == 2){
                        bus->print_stats();
                        lkw->print_stats();
                        delete lkw;
                } else if (op == 3){
                        delete bus;
                        delete lkw;
                        cout << "Fahrzeuge geloescht" << endl;
                }
        }

        return 0;
}
