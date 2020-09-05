<?php
namespace bitcoin\utils;

use bitcoin;

function validate_address(bitcoin\bitcoin $bitcoin_instance, $address){
    $json_response = $bitcoin_instance->do_request('validateaddress', [$address]);

    return new responses\address_validation($json_response);
}

function validate_message(bitcoin\bitcoin $bitcoin_instance, $address, $signature, $message){
    return (bool)$bitcoin_instance->do_request('verifymessage', [$address, $signature, $message]);
}