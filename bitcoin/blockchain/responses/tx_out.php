<?php
namespace bitcoin\blockchain\responses;

class script_pub_key {
    public $asm, $hex, $req_sigs, $type, $addresses;

    function __construct(array $data){
        $this->asm = $data['asm'] ?? null;

        $this->hex = $data['hex'] ?? null;

        $this->req_sigs = $data['reqSigs'] ?? null;

        $this->type = $data['type'] ?? null;

        $this->addresses = $data['addresses'] ?? null; //str array
    }
}

class tx_out{
    public $bestblock, $confirmations, $value;

    public $script_pub_key;

    public $coinbase;

    function __construct(array $data) {
        $this->bestblock = $data['bestblock'] ?? null;

        $this->confirmations = $data['confirmations'] ?? null;

        $this->value = $data['value'] ?? null;

        $this->script_pub_key = new script_pub_key($data['scriptPubKey'] ?? []);

        $this->coinbase = $data['coinbase'] ?? null;
    }
}