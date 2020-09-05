<?php
namespace bitcoin\wallet\responses;

use bitcoin;

class details{
    public $address, $category, $amount, $label, $vout, $fee,
        $abandoned;

    function __construct(array $data){
        $this->address = $data['address'] ?? null;
        $this->category = $data['category'] ?? null;

        $this->amount = $data['amount'] ?? null;
        $this->label = $data['label'] ?? null;

        $this->vout = $data['vout'] ?? null;
        $this->fee = $data['fee'] ?? null;

        $this->abandoned = $data['abandoned'] ?? null;
    }
}

class transaction{
    public $amount, $fee, $confirmations,
        $blockhash, $blockindex, $blocktime,
            $tx_id, $time, $time_received, $bip125_replaceable,
                $hex;

    public $details;

    function __construct(array $data){
        $this->amount = $data['amount'] ?? null;
        $this->fee = $data['fee'] ?? null;
        $this->confirmations = $data['confirmations'] ?? null;

        $this->blockhash = $data['blockhash'] ?? null;
        $this->blockindex = $data['blockindex'] ?? null;
        $this->blocktime = $data['blocktime'] ?? null;

        $this->tx_id = $data['txid'] ?? null;
        $this->time = $data['time'] ?? null;
        $this->time_received = $data['timereceived'] ?? null;

        $this->bip125_replaceable = $data['bip125-replaceable'] ?? null;

        $details = $data['details'] ?? null;

        if($details !== null)
            foreach($details as $single)
                $this->details[] = new details($single);

        $this->hex = $data['hex'] ?? null;
    }
}