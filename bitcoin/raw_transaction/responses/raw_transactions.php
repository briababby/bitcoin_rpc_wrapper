<?php
namespace bitcoin\raw_transaction\responses;

use bitcoin\blockchain\responses\script_pub_key;

class vin{
    public $tx_id, $vout;

    public array $script_sig;

    public $sequence, $tx_in_witness;

    function __construct(array $data){
        $this->tx_id = $data['txid'] ?? null; // string

        $this->vout = $data['vout'] ?? null; // int

        $this->script_sig = isset($data['scriptSig']) ? json_decode($data['scriptSig']) : []; // string array

        $this->sequence = $data['sequence'] ?? null; // int

        $this->tx_in_witness = $data['txinwitness'] ?? []; // string array
    }
}

class vout{
    public $value, $index;

    public $script_pub_key;

    function __construct(array $data){
        $this->value = $data['value'] ?? null; // string

        $this->index = $data['n'] ?? null; // int

        $this->script_pub_key = new script_pub_key($data['scriptPubKey'] ?? []);
    }
}

class raw_transaction{
    public $in_active_chain, $hex, $tx_id, $hash,
        $size, $vsize, $weight, $version, $locktime;

    private array $vins, $vouts;

    public $blockhash, $confirmations, $blocktime, $time;

    public function get_vins(){
        $out = [];

        foreach($this->vins as $vin)
            $out[] = new vin($vin);

        return $out;
    }

    public function get_vouts(){
        $out = [];

        foreach($this->vouts as $vout)
            $out[] = new vout($vout);

        return $out;
    }

    function __construct(array $data){
        $this->in_active_chain = $data['in_active_chain'] ?? null;
        $this->hex = $data['hex'] ?? null;

        $this->tx_id = $data['txid'] ?? null;
        $this->hash = $data['hash'] ?? null;
        $this->size = $data['size'] ?? null;
        $this->vsize = $data['vsize'] ?? null;
        $this->weight = $data['weight'] ?? null;
        $this->version = $data['version'] ?? null;
        $this->locktime = $data['locktime'] ?? null;

        $this->vins = $data['vin'] ?? [];
        $this->vouts = $data['vout'] ?? [];

        $this->blockhash = $data['blockhash'] ?? null;
        $this->confirmations = $data['confirmations'] ?? null;
        $this->blocktime = $data['blocktime'] ?? null;
        $this->time = $data[''] ?? null;
    }
}