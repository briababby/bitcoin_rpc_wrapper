<?php
namespace bitcoin\raw_transaction;

use bitcoin\blockchain\responses;

use bitcoin;

function decode_script(bitcoin\bitcoin $bitcoin_instance, $hex_string){
    $json_response = $bitcoin_instance->do_request('decodescript', [$hex_string]);

    return new responses\script_pub_key($json_response);
}