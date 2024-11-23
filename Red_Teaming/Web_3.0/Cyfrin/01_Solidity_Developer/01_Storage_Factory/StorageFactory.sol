// SPDX-License-Identifier: MIT

pragma solidity 0.8.24; 

//Named imports
import { SimpleStorage } from "./SimpleStorage.sol"; 

contract StorageFactroy{

    SimpleStorage public simpleStorage; 
    //Storage Factory deploys other contract
    function createSimpleStorageContract() public {
        simpleStorage = new SimpleStorage(); 
    }
}