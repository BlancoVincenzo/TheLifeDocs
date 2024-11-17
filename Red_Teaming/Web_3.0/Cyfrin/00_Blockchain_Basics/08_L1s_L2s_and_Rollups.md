# Layer1

Layer1 is the Blockchain in its purest form. 
It is the Base Layer of the Blockchain Ecosystem in which transactions are executed and confirmed

Layer1 Chains: Bitcoin, Ethereum, Solana, BNB Chain, Everlaunch


# Layer2

Build outsite of L1 and Hooks back in to Layer1

L2 Applications:
Chainlink - DOracleNetwork off chain data to onchain;

TheGraph - EventIndexingNetowrk Access onchain data

Rollups (L2 Chain) 
L2 Scaling Solution - increase number of transactions on the L1 chain without increasing Gas-Costs; Do rollup many transactions into one

Why do we need L2 Rollups? 
- dezentralized
- secure (51% attack, sybil attack - pseudoanonymous accounts, reply attacks (send multiple same transaction))

Triangle Dilemma 
Security Scaleability Dezentralizing

Processing on L1 blockchain <-- security and dezentralizing will be kept 

User commits transactions to Rollup (zkSync)
Operator pick ups transaction, order them with other user transactions and bundle them togehter, compress them and send them to L1 Blockchain

## Types of Rollups

Optimistic Rollups 
- transaction valid by default
- challange period; challange rollup transaction
    using fraud proof <-- call and response game with other node/operator
    --> narrow down to one computational step
    --> nodes with wrong computation get slashed

ZeroKnowledge Rollups
- ZK Validity Proof
- Validator L1 contract
- Proofer knows smth without revealing
- based on math