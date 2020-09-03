<?php
namespace bitcoin\blockchain;

use bitcoin;

// TODO: actually test the stuff here

function get_mem_pool_ancestors(bitcoin\bitcoin $bitcoin_instance, $tx_id, $verbose = false){
    $out = [];

    $json_response = $bitcoin_instance->do_request('getmempoolancestors', [$tx_id, $verbose]);

    if(!$verbose)
        return $json_response;

    $all_trans = $json_response['transactionid'];

    foreach($all_trans as $single_trans)
        $out[] = new responses\mem_pool($single_trans);

    return $out;
}

function get_mem_pool_descendants(bitcoin\bitcoin $bitcoin_instance, $tx_id, $verbose = false){
    $out = [];

    $json_response = $bitcoin_instance->do_request('getmempooldescendants', [$tx_id, $verbose]);

    if(!$verbose)
        return $json_response;

    $all_trans = $json_response['transactionid'];

    foreach($all_trans as $single_trans)
        $out[] = new responses\mem_pool($single_trans);

    return $out;
}

function get_mem_pool_entry(bitcoin\bitcoin $bitcoin_instance, $tx_id){
    $json_response = $bitcoin_instance->do_request('getmempoolentry', [$tx_id]);

    return new responses\mem_pool($json_response);
}

function get_mem_pool_info(bitcoin\bitcoin $bitcoin_instance){
    return (array)$bitcoin_instance->do_request('getmempoolinfo');
}

function get_raw_mem_pool(bitcoin\bitcoin $bitcoin_instance, $verbose = false){
    $out = [];

    $json_response = $bitcoin_instance->do_request('getrawmempool', [$verbose]);

    if(!$verbose)
        return $json_response;

    $all_trans = $json_response['transactionid'];

    foreach($all_trans as $single_trans)
        $out[] = new responses\mem_pool($single_trans);

    return $out;
}

function save_mem_pool(bitcoin\bitcoin $bitcoin_instance){
    $bitcoin_instance->do_request('savemempool');
}