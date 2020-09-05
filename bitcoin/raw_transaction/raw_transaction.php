<?php
namespace bitcoin\raw_transaction;

use bitcoin;

function combine_raw_transaction(bitcoin\bitcoin $bitcoin_instance, array $txs){
    return (string)$bitcoin_instance->do_request('combinerawtransaction', [$txs]);
}

function create_raw_transaction(bitcoin\bitcoin $bitcoin_instance, array $inputs, array $outputs, $locktime = 0, $replaceable = false) {
    return (string)$bitcoin_instance->do_request('createrawtransaction',
        [json_encode($inputs), json_encode($outputs), $locktime, $replaceable]);
}

function decode_raw_transaction(bitcoin\bitcoin $bitcoin_instance, $hex_string, $is_witness = null){
    $json_response = $bitcoin_instance->do_request('decoderawtransaction',
        ($is_witness !== null) ? [$hex_string, $is_witness] : [$hex_string]);

    return new responses\raw_transaction($json_response);
}

function get_raw_transaction(bitcoin\bitcoin $bitcoin_instance, $tx_id, $verbose = false, $blockhash = null){
    $json_response = $bitcoin_instance->do_request('getrawtransaction',
        ($blockhash !== null) ? [$tx_id, $verbose, $blockhash] : [$tx_id, $verbose]);

    if(!$verbose)
        return (string)$json_response;

    return new responses\raw_transaction($json_response);
}

function send_raw_transaction(bitcoin\bitcoin $bitcoin_instance, $hex_string, $allow_high_fees = false){
    return (string)$bitcoin_instance->do_request('sendrawtransaction', [$hex_string, $allow_high_fees]);
}