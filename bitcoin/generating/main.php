<?php
namespace bitcoin\generating;

use bitcoin;

class generating {
    private $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function generate($nblocks, $max_tries = 1000000){
        return generate($this->bitcoin_instance, $nblocks, $max_tries);
    }

    function generate_to_address($nblocks, $address, $max_tries = 1000000){
        return generate_to_address($this->bitcoin_instance, $nblocks, $address, $max_tries);
    }
}