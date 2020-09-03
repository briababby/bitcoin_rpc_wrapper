<?php
require '../bitcoin/autoload.php';

$bitcoin_instance = new bitcoin\bitcoin('http://127.0.0.1:8332', 'user', 'pass');

$blockchain = $bitcoin_instance->blockchain;

print_r($blockchain->get_blockchain_info());

print_r($blockchain->get_mem_pool_info());
