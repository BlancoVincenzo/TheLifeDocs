
# Introduction to Smart Contracts

## A Simple Smart Contract

### Solidity Overview
- Solidity is an object-oriented, high-level language for writing smart contracts.
- Smart contracts govern account behaviors (e.g., using functions like `set`) within the Ethereum state.

### Solidity Characteristics
- **Statically Typed**: Once a variable is declared, its type can't change (e.g., from a string to an integer).
- **Type Checking**: Type checking is done at compile time, ensuring type consistency.
- **Features**: Includes inheritance, external libraries, and complex custom data types.

### Example Use Cases
- Voting systems
- Crowdfunding
- Auctions
- Multi-signature wallets

```solidity
// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.4.16 <0.9.0;

contract SimpleStorage {
    uint storedData;

    function set(uint x) public {
        storedData = x;
    }

    function get() public view returns (uint) {
        return storedData;
    }
}
```

### Key Components
- **License Declaration**: Specify the license with the `SPDX-License-Identifier`.
- **Solidity Version**: Defined with `pragma` keyword (`pragma solidity >=0.4.16 <0.9.0;`). This ensures compatibility without using a breaking version.
- **Contracts**: A contract is a collection of code (functions and data states) residing at a specific Ethereum Blockchain Address.
- **State Variables**: Example - `uint` (unsigned integer of 256 bits) is a state variable stored on the blockchain.

### Scope
- **Public**: Allows access to state-variable values from outside the contract. If not marked as `public`, external contracts can't access the variable.

### Data Types
- **Address**: 160-bit value, storing contract addresses or the hash of public keys. Doesn't support arithmetic operations.
- **Mapping**: A hashtable-like structure. Example - `mapping(address => uint) public balances`.
- **Event**: Allows clients to listen for events emitted from the blockchain. Example -
  ```solidity
  event Sent(address from, address to, uint amount);
  emit Sent(msg.sender, receiver, amount);
  ```
- **Error Handling**: Define errors using `error`. Example -
  ```solidity
  error InsufficientBalance(uint requested, uint available);
  ```

### Constructor
- Executes only once during contract creation. For instance, it can store the creator's address permanently.

### Special Variables
- **`msg`, `tx`, and `block`**: Special global variables to access blockchain data.
- **`msg.sender`**: The address of the current external function caller.

### Function Requirements
- **`require()`**: Defines conditions for function execution. If conditions aren't met, the function can revert.
- **`revert`**: Works like `require()` but provides a named error and additional data to the caller.

## Blockchain Basics

- Blockchain is a globally shared, transactional database accessible to everyone through a peer-to-peer network.
- Core Components:
  - **Mining**: Secures the network and validates transactions.
  - **Hashing**: Cryptographically secures data.
  - **Elliptic-Curve Cryptography**: Ensures secure key-pair generation.

## Transactions

- **Definition**: Transactions are changes in the database that are accepted by all network participants.
- **Properties**:
  - A transaction either completes fully or doesn't happen at all (atomicity).
  - Transactions are cryptographically signed by the creator, ensuring authenticity and security.

## Blocks

- **Double Spend Attack**: Prevented as only one block is valid; others won't be written to the blockchain.
- **Linear Sequence**: Blocks are organized in a linear, time-ordered sequence.
- **Attestation Mechanism**: Determines the block order; blocks can be reverted at the chain-tip.
- **Miner Dependency**: Adding a transaction to a block depends on miners, not submitters.

## The Ethereum Virtual Machine (EVM)

- **Runtime Environment**: Executes smart contracts in an isolated environment without access to network, file systems, or other processes.

## Accounts

### Types of Accounts
- **External Accounts**: Managed by humans and controlled with asymmetric key pairs.
- **Contract Accounts**: Controlled by code within the account.

### Address Generation
- **External Account**: Address derived from the public key.
- **Contract Account**: Address derived from creator address and transaction nonce during creation.

### Key Aspects
- Both accounts have a persistent key-value store (storage) and a balance in Ether (measured in wei).

## The Ethereum Virtual Machine (EVM)
- a runtime environment
- sandboxed & isolated (no netwprk access, filesystem etc.)

### Transactions
- message (binary data and Ether) sent from one to another account


### Gas 
- has to be paid by transaction originator
- if negative --> out of gas exception
- each block has a maximum amount of gas

Gas can be refunded if there is some gas left
- if exception occurs used gas wont be refunded
- low gas prices may lead to non-execution of transaction

### Storage, Transient Storage, Memory and the Stacl

There are 4 different memory types 
- storage
- transient storage
- memory
- stack

The Storage
- persistent between function calls & transactions
- key-value store: maps 256-bit words to 256-bit words
- storage should be minimized cause of cost (only most needed)
- contract can only write / read his own storage

Transient Storage
- reset at end of transaction 
- only persist across fucnction calls
- significantly lower than default storage

Memory
- clear instance on "memory" for each message call
- linear and can be addressed on byte-lvl
- reads limited to 256 bits
- writes 8 or 256 bit 
- scales quadtratically
- memory expends by a word (256 bit) by access a previously untouched memory word


### Calldata, Returndata and Code

Calldata region sent to transaction. 
When Creating a  Contract --> Calldata is the construction code of new contract

External function parameters are always initially stored in Calldata ABI-Encoded

memory --> direct decoding from ABI on function call 
calldata --> lazily loaded when accessed

Value types and storage pointers are decoded directly onto the stack

#### Returndata 

returns value after a call
return keyword --> ABI-Encode values into the returndata area

Immutabledata are set only once during contract deployment
Constant data is fixes at compile time

### Instrucion Set 
Instructions run only on
- basic data type (256 bit word)
- or slices of memeory (or other btyte arrays)
[List of OpCodes](https://docs.soliditylang.org/en/v0.8.28/yul.html#opcodes)

### message call 
- contract can call other contracts <-- message calls
- message calls are similar to transactions
--> source, target, data payload, Ether, gas and return type
- evey message consists of top-level message which can create further messag calls
- contract can decide how much gas with inner message call
- calls are limited to 1024 --> loops should be prevered over recursive calls 

### Delegatecall and Linraries
special message call the delegatecall
target-address is executed in the context of the calling contract
msg.sender & msg.value do not change values

contract can load dynamically code from different address during runtime

### Logs
Logs are safed in Bloom Filters

### Selfdestruct

selfdestruct operation --> removes code from blockchain
Ether can be forever lost when send to selfdestructed contracts

deactivate contracts via inernal state

### Precompiled Contracts
betwenn 1 and 0xffff inclusive implemented by the EVM

[Further Reading on Solidity](https://docs.soliditylang.org/en/v0.8.28/introduction-to-smart-contracts.html#index-8)
