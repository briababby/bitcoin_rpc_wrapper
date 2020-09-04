<?php
namespace bitcoin\blockchain\responses;

use bitcoin\raw_transaction\responses\raw_transaction;

class block {
    public $hash,
        $confirmations,
        $size, $stripped_size,
        $weight, $height,
        $version, $version_hex,
        $merkle_root;

    public $transactions_data;

    public $time, $median_time,
        $nonce, $bits, $difficulty,
            $chainwork, $n_tx, $previous_block_hash, $next_block_hash;

    function __construct(array $data, $ultra_verbose = false){
        $this->hash = $data['hash'] ?? null; // string

        $this->confirmations = $data['confirmations'] ?? null; // int

        $this->size = $data['size'] ?? null; // int
        $this->stripped_size = $data['strippedsize'] ?? null; // int

        $this->weight = $data['weight'] ?? null; // int
        $this->height = $data['height'] ?? null; // int

        $this->version = $data['version'] ?? null; // int
        $this->version_hex = $data['versionHex'] ?? null; // string

        $this->merkle_root = $data['merkleroot'] ?? null; // string

        $transactions = $data['tx'] ?? null;

        if($transactions !== null)
            foreach($transactions as $transaction)
                $this->transactions_data[] = ($ultra_verbose) ?
                    new raw_transaction($transaction) : $transaction;

        $this->time = $data['time'] ?? null; // int
        $this->median_time = $data['mediantime'] ?? null; // int
        $this->nonce = $data['nonce'] ?? null; // int

        $this->bits = $data['bits'] ?? null; // string

        $this->difficulty = $data['difficulty'] ?? null; // int
        $this->chainwork = $data['chainwork'] ?? null; // string

        $this->n_tx = $data['nTx'] ?? null; // int

        $this->previous_block_hash = $data['previousblockhash'] ?? null; // string
        $this->next_block_hash = $data['nextblockhash'] ?? null; // string
    }
}

class block_statistics{
    public $blockhash; // string

    public array $feerate_percentiles; // int array

    // all of these are ints
    public $avg_fee, $avg_fee_rate, $avg_tx_size,
        $height, $inputs, $outputs, $subsidy,
        $max_fee, $max_fee_rate, $max_tx_size,
        $median_fee, $median_time, $median_tx_size,
        $min_fee, $min_fee_rate, $min_tx_size,
        $sw_total_size, $sw_total_weight, $sw_txs, $time,
        $total_out, $total_size, $total_weight, $total_fee,
        $txs, $utxo_increase, $utxo_size_inc;

    function __construct(array $data){
        $this->blockhash = $data['blockhash'] ?? null;

        $this->feerate_percentiles = $data['feerate_percentiles'] ?? [];

        $this->avg_fee = $data['avgfee'] ?? null;
        $this->avg_fee_rate = $data['avgfeerate'] ?? null;
        $this->avg_tx_size = $data['avgtxsize'] ?? null;

        $this->height = $data['height'] ?? null;

        $this->inputs = $data['ins'] ?? null;
        $this->outputs = $data['outs'] ?? null;

        $this->subsidy = $data['subsidy'] ?? null;

        $this->max_fee = $data['maxfee'] ?? null;
        $this->max_fee_rate = $data['maxfeerate'] ?? null;
        $this->max_tx_size = $data['maxtxsize'] ?? null;

        $this->median_fee = $data['medianfee'] ?? null;
        $this->median_time = $data['mediantime'] ?? null;
        $this->median_tx_size = $data['mediantxsize'] ?? null;

        $this->min_fee = $data['minfee'] ?? null;
        $this->min_fee_rate = $data['minfeerate'] ?? null;
        $this->min_tx_size = $data['mintxsize'] ?? null;

        $this->sw_total_size = $data['swtotal_size'] ?? null;
        $this->sw_total_weight = $data['swtotal_weight'] ?? null;
        $this->sw_txs = $data['swtxs'] ?? null;

        $this->time = $data['time'] ?? null;

        $this->total_out = $data['total_out'] ?? null;
        $this->total_size = $data['total_size'] ?? null;
        $this->total_weight = $data['total_weight'] ?? null;
        $this->total_fee = $data['totalfee'] ?? null;

        $this->txs = $data['txs'] ?? null;

        $this->utxo_increase = $data['utxo_increase'] ?? null;
        $this->utxo_size_inc = $data['utxo_size_inc'] ?? null;
    }

}