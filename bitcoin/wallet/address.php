<?php
namespace bitcoin\wallet;

use bitcoin;

function dump_private_key(bitcoin\bitcoin $bitcoin_instance, $address){
    return (string)$bitcoin_instance->do_request('dumpprivkey', [$address]);
}

function get_addresses_by_label(bitcoin\bitcoin $bitcoin_instance, $label){
    $json_response = $bitcoin_instance->do_request('getaddressesbylabel', [$label]);

    return new responses\label($json_response);
}

function get_address_info(bitcoin\bitcoin $bitcoin_instance, $address){
    $json_response = $bitcoin_instance->do_request('getaddressinfo', [$address]);

    return new responses\address($json_response);
}

//legacy, p2sh-segwit or bech32
function get_new_address(bitcoin\bitcoin $bitcoin_instance, $label = '', $address_type = ''){
    return (string)$bitcoin_instance->do_request('getnewaddress',
        ($address_type !== '') ? [$label, $address_type] : [$label]);
}

function get_raw_change_address(bitcoin\bitcoin $bitcoin_instance, $address_type = ''){
    return (string)$bitcoin_instance->do_request('getrawchangeaddress',
        ($address_type !== '') ? [$address_type] : []);
}

function get_received_by_address(bitcoin\bitcoin $bitcoin_instance, $address, $min_conf = 1){
    return (int)$bitcoin_instance->do_request('getreceivedbyaddress', [$address, $min_conf]);
}

function get_received_by_label(bitcoin\bitcoin $bitcoin_instance, $label = '', $min_conf = 1){
    return (int)$bitcoin_instance->do_request('getreceivedbylabel', [$label, $min_conf]);
}

function send_to_address
(bitcoin\bitcoin $bitcoin_instance, $address, $amount, $comment = '',
 $comment_to = '', $subtract_fee_from_amount = false){
    return (string)$bitcoin_instance->do_request('sendtoaddress',
        [$address, $amount, $comment, $comment_to, $subtract_fee_from_amount]);
}

function send_to_many
(bitcoin\bitcoin $bitcoin_instance, $dummy, array $amounts, $min_conf = 1,
 $comment = '', array $subtract_fee_from = []){
    $amounts = json_encode($amounts);

    //array("address" => amount)

    return (string)$bitcoin_instance->do_request('sendmany',
        ($subtract_fee_from === []) ? [$dummy, $amounts, $min_conf, $comment] :
            [$dummy, $amounts, $min_conf, $comment, json_encode($subtract_fee_from)]);
}

function set_label(bitcoin\bitcoin $bitcoin_instance, $address, $label){
    $bitcoin_instance->do_request('setlabel', [$address, $label]);
}

function sign_message(bitcoin\bitcoin $bitcoin_instance, $address, $message){
    return (string)$bitcoin_instance->do_request('signmessage', [$address, $message]);
}