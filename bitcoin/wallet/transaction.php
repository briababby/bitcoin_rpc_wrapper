<?php
namespace bitcoin\wallet;

use bitcoin;

function abandon_transaction(bitcoin\bitcoin $bitcoin_instance, $tx_id){
    $bitcoin_instance->do_request('abandontransaction', [$tx_id]);
}

function get_transaction(bitcoin\bitcoin $bitcoin_instance, $tx_id, $include_watchonly = false){
    $json_response = $bitcoin_instance->do_request('gettransaction', [$tx_id, $include_watchonly]);

    return new responses\transaction($json_response);
}

function list_transactions(bitcoin\bitcoin $bitcoin_instance, $label = '*', $count = 10, $skip = 0, $include_watchonly = false){
    $out = [];
    $json_response = $bitcoin_instance->do_request('listtransactions', [$label, $count, $skip, $include_watchonly]);

    // i don't know if this returns a transaction array or a single transaction because of https://developer.bitcoin.org/reference/rpc/listtransactions.html
    // as the name is listtransactions i suppose it's used to list all

    foreach($json_response as $single_trs)
        $out[] = new responses\transaction($single_trs);

    return $out;
}