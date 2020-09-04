<?php
namespace bitcoin\raw_transaction;

use bitcoin;

class raw_transaction {
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    #region raw_transaction
    function combine(array $txs){
        return combine_raw_transaction($this->bitcoin_instance, $txs);
    }

    function create(array $inputs, array $outputs, $locktime = 0, $replaceable = false) {
        return create_raw_transaction($this->bitcoin_instance, $inputs, $outputs, $locktime, $replaceable);
    }

    function decode($hex_string, $is_witness = null){
        return decode_raw_transaction($this->bitcoin_instance, $hex_string, $is_witness);
    }

    function get($tx_id, $verbose = false, $blockhash = null){
        return get_raw_transaction($this->bitcoin_instance, $tx_id, $verbose, $blockhash);
    }

    function send($hex_string, $allow_high_fees = false){
        return send_raw_transaction($this->bitcoin_instance, $hex_string, $allow_high_fees);
    }
    #endregion

    #region script
    function decode_script($hex_string){
        return decode_script($this->bitcoin_instance, $hex_string);
    }
    #endregion
}