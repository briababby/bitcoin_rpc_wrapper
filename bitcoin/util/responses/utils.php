<?php
namespace bitcoin\utils\responses;

class address_validation {
    public $is_valid, $address, $script_pub_key,
        $is_script, $is_witness, $witness_version, $witness_program;

    function __construct(array $data){
       $this->is_valid = $data['isvalid'] ?? null;

       $this->address = $data['address'] ?? null;

       $this->script_pub_key = $data['scriptPubKey'] ?? null;

       $this->is_script = $data['isscript'] ?? null;

       $this->is_witness = $data['iswitness'] ?? null;

       $this->witness_version = $data['witness_version'] ?? null;

       $this->witness_program = $data['witness_program'] ?? null;
    }
}