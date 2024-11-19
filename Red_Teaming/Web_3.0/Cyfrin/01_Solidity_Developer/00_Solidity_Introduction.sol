// SPDX-License-Identifier: MIT
pragma solidity 0.8.26;

contract SimpleStorage {

    // Basic Types: boolean, uint, int, address, bytes
    // bool hasFavoriteNumber = true; 
    //scope by default internal (public, private, internal, external)
    //public is automatically compiling a getter and setter function
    //private only the contract can see
    //external(only function not for variables)
    // internal --> only internal and child contracts can access
    uint256 public favoriteNumber; // = 0 if no value is initialized
    //standard uint is 256 bits 
    // int favoriteNumberTwo = -23; //aslo negative numbers
    // address myaddress = 0xded3cBA3130523C40064C7455e86a0e80f9D03a8; 
    // bytes32 favoriteBytes32 = "cat";
    // string favoriteString = "test";
    //bytes & bytes32 is something different


    //functions
    //0xd8b934580fcE35a11B58C6D73aDeE468a2833fa8
    function store(uint256 _favoriteNumber) public {
        favoriteNumber = _favoriteNumber; 
    }

    //DEPLYING A CONTRACT NEEDS TRANSACTION; need of gas

    //view function only read states <-- no need for computation
    //diasallows state updating

    //pure function dissalow reading & updating state

    //transaction vs calls 
    //if transaction class ware calling view/pure it will cost 
    uint256 listOfNbr; 

    struct Person {
        string name;
        uint256 favNbrPerson;  
    }

    Person public pat = Person({favNbrPerson: 7, name: "pat"});
    //static array
    Person[3] public listOfPerson; 

    Person[] public listOfPersonTwo; 

    mapping(string => uint256) public nameToNumber; 


    function addPerson(string memory _name, uint256 _favoriteNumber) public {
        listOfPersonTwo.push(Person(_name, _favoriteNumber));
        nameToNumber[_name] = _favoriteNumber; 
    }

    // Write & Read
    // Stack, Memory, Storage, Transient Storage, Calldata, Code, Returndata

    // Write (not read)
    // Logs

    //Read (not write)
    //Transaction data, Chain Data, Gas Data, Program counter

    //caldata, memory, storage
    //memory and calldata only exists only for one call

    //memory variable can be manipulated
    //calldata cant be modified
    //storage permanent that can be modified

    //structs mapping and arrays need memory keyword (string = array of bytes)
}