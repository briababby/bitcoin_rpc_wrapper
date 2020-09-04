<?php
namespace bitcoin\blockchain;

use bitcoin;


class blockchain {
    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->block = new blocks($bitcoin_instance);

        $this->chain = new chains($bitcoin_instance);

        $this->mem_pool = new mem_pools($bitcoin_instance);

        $this->tx_out = new tx_outs($bitcoin_instance);
    }

    public $block, $chain, $mem_pool, $tx_out;
}
#region bruhN2
class blocks {
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function best_hash(){
        return bitcoin\blockchain\get_best_block_hash($this->bitcoin_instance);
    }

    function get($blockhash, $verbosity = 0){
        return bitcoin\blockchain\get_block($this->bitcoin_instance, $blockhash, $verbosity);
    }

    function count(){
        return bitcoin\blockchain\get_block_count($this->bitcoin_instance);
    }

    function hash($height){
        return bitcoin\blockchain\get_block_hash($this->bitcoin_instance, $height);
    }

    function header($blockhash, $verbose = false){
        return bitcoin\blockchain\get_block_header($this->bitcoin_instance, $blockhash, $verbose);
    }

    function stats($hash_or_height, $stats = null){
        return bitcoin\blockchain\get_block_stats($this->bitcoin_instance, $hash_or_height, $stats);
    }
}

class chains{
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function info(){
        return bitcoin\blockchain\get_blockchain_info($this->bitcoin_instance);
    }

    function tips(){
        return bitcoin\blockchain\get_chain_tips($this->bitcoin_instance);
    }

    function tx_stats($nblocks = null, $blockhash = null){
        return bitcoin\blockchain\get_chain_tx_stats($this->bitcoin_instance, $nblocks, $blockhash);
    }

    function verify($check_level = 3, $nblocks = 6){
        return bitcoin\blockchain\verify_chain($this->bitcoin_instance, $check_level, $nblocks);
    }
}

class mem_pools{
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function ancestors($tx_id, $verbose = false){
        return bitcoin\blockchain\get_mem_pool_ancestors($this->bitcoin_instance, $tx_id, $verbose);
    }

    function descendants($tx_id, $verbose = false){
        return bitcoin\blockchain\get_mem_pool_descendants($this->bitcoin_instance, $tx_id, $verbose);
    }

    function entry($tx_id){
        return bitcoin\blockchain\get_mem_pool_entry($this->bitcoin_instance, $tx_id);
    }

    function info(){
        return bitcoin\blockchain\get_mem_pool_info($this->bitcoin_instance);
    }

    function get_raw($verbose = false){
        return bitcoin\blockchain\get_raw_mem_pool($this->bitcoin_instance, $verbose);
    }

    function save(){
        bitcoin\blockchain\save_mem_pool($this->bitcoin_instance);
    }
}

class tx_outs{
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function get($tx_id, $vout_number, $include_mem_pool = false){
        return bitcoin\blockchain\get_tx_out($this->bitcoin_instance, $tx_id, $vout_number, $include_mem_pool);
    }

    function get_proof(array $tx_id){
        return bitcoin\blockchain\get_tx_out_proof($this->bitcoin_instance, $tx_id);
    }

    function get_set_info(){
        return bitcoin\blockchain\get_tx_out_set_info($this->bitcoin_instance);
    }

    function verify_proof($proof){
        return bitcoin\blockchain\verify_tx_out_proof($this->bitcoin_instance, $proof);
    }
}
#endregion