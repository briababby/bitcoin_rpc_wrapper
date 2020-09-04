<?php
namespace bitcoin\blockchain;

use bitcoin;

function get_blockchain_info(bitcoin\bitcoin $bitcoin_instance){
    return (array)$bitcoin_instance->do_request('getblockchaininfo');
}

function get_chain_tips(bitcoin\bitcoin $bitcoin_instance){
    return (array)$bitcoin_instance->do_request('getchaintips');
}

function get_chain_tx_stats(bitcoin\bitcoin $bitcoin_instance, $nblocks = null, $blockhash = null){
    $json_response = $bitcoin_instance->do_request('getchaintxstats', array_filter([$nblocks, $blockhash]));

    return new responses\tx_statistics($json_response);
}

function verify_chain(bitcoin\bitcoin $bitcoin_instance, $check_level = 3, $nblocks = 6){
    return (bool)$bitcoin_instance->do_request('verifychain', [$check_level, $nblocks]);
}