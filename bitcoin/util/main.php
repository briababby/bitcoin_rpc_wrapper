<?php
namespace bitcoin\utils;

use bitcoin;

class util{
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function validate_address($address){
        return validate_address($this->bitcoin_instance, $address);
    }

    function validate_message($address, $signature, $message){
        return validate_message($this->bitcoin_instance, $address, $signature, $message);
    }
}