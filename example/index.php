<?php
require '../bitcoin/autoload.php';

$bitcoin_instance = new bitcoin\bitcoin('http://127.0.0.1:8332', 'user', 'pass');

$test_mode = 0;

if($test_mode === 0) {
    $bitcoin_utils = $bitcoin_instance->util;

    $my_address_validation = $bitcoin_utils->validate_address('1GksJA2LTemR8MRAH76sf6aMC8m1CUk3Ge');

    echo $my_address_validation->is_valid ? 'true' : 'false';
}
else if($test_mode === 1){
    $bitcoin_raw_transactions = $bitcoin_instance->raw_transaction;

    $random_transaction_data = $bitcoin_raw_transactions->get('d5ada064c6417ca25c4308bd158c34b77e1c0eca2a73cda16c737e7424afba2f');

    echo $random_transaction_data->confirmations;
}
else if($test_mode === 2){
    $bitcoin_blockchain = $bitcoin_instance->blockchain;

    $random_block = $bitcoin_blockchain->block->get('000000000000000000127c6c65c8693b62d6b0f0c20ce0bb252653d98b2767f0');

    echo $random_block->height;
}
else if($test_mode === 3){
    $bitcoin_wallet_management = $bitcoin_instance->wallet->management;

    $bitcoin_wallet_management->create('test wallet2');

    print_r($bitcoin_wallet_management->list_all());
}
