<?php
namespace bitcoin\generating;

use bitcoin;

function generate(bitcoin\bitcoin $bitcoin_instance, $nblocks, $max_tries = 1000000){
    return (array)$bitcoin_instance->do_request('generate', [$nblocks, $max_tries]);
}

function generate_to_address(bitcoin\bitcoin $bitcoin_instance, $nblocks, $address, $max_tries = 1000000){
    return (array)$bitcoin_instance->do_request('generatetoaddress', [$nblocks, $address, $max_tries]);
}