<?php
namespace bitcoin\blockchain;

use bitcoin;

function get_best_block_hash(bitcoin\bitcoin $bitcoin_instance){
    return (string)$bitcoin_instance->do_request('getbestblockhash');
}

function get_block(bitcoin\bitcoin $bitcoin_instance, $blockhash, $verbosity = 0){
    $json_response = $bitcoin_instance->do_request('getblock', [$blockhash, $verbosity]);

    if($verbosity === 0)
        return (string)$json_response;

    return new responses\block($json_response, ($verbosity === 2));
}

function get_block_count(bitcoin\bitcoin $bitcoin_instance){
    return (int)$bitcoin_instance->do_request('getblockcount');
}

function get_block_hash(bitcoin\bitcoin $bitcoin_instance, $height){
    return (string)$bitcoin_instance->do_request('getblockhash', [$height]);
}

function get_block_header(bitcoin\bitcoin $bitcoin_instance, $blockhash, $verbose = false){
    $json_response = $bitcoin_instance->do_request('getblockheader', [$blockhash, $verbose]);

    if(!$verbose)
        return $json_response;

    return new responses\block($json_response);
}

function get_block_stats(bitcoin\bitcoin $bitcoin_instance, $hash_or_height, $stats = null){
    $json_response = $bitcoin_instance->do_request('getblockstats',
        ($stats !== null) ? [$hash_or_height, $stats] : [$hash_or_height]);

    return new responses\block_statistics($json_response);
}