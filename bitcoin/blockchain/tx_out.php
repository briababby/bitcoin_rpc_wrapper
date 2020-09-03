<?php
namespace bitcoin\blockchain;

use bitcoin;

function get_tx_out(bitcoin\bitcoin $bitcoin_instance, $tx_id, $vout_number, $include_mem_pool = false){
    $json_response = $bitcoin_instance->do_request('getblockchaininfo', [$tx_id, $vout_number, $include_mem_pool]);

    return new responses\tx_out($json_response);
}

function get_tx_out_proof(bitcoin\bitcoin $bitcoin_instance, array $tx_id){
    return (string)$bitcoin_instance->do_request('gettxoutproof', [$tx_id]);
}

function get_tx_out_set_info(bitcoin\bitcoin $bitcoin_instance){
    return (array)$bitcoin_instance->do_request('gettxoutsetinfo');
}

function verify_tx_out_proof(bitcoin\bitcoin $bitcoin_instance, $proof){
    return (array)$bitcoin_instance->do_request('verifytxoutproof', [$proof]);
}