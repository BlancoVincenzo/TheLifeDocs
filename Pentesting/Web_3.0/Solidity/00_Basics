
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

---

[Further Reading on Solidity](https://docs.soliditylang.org/en/v0.8.28/introduction-to-smart-contracts.html#index-8)
