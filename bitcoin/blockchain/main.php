<?php
namespace bitcoin\blockchain;

use bitcoin;

class blockchain {
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    #region blocks
    function get_best_block_hash(){
        return bitcoin\blockchain\get_best_block_hash($this->bitcoin_instance);
    }

    function get_block($blockhash, $verbosity = 0){
        return bitcoin\blockchain\get_block($this->bitcoin_instance, $blockhash, $verbosity);
    }

    function get_block_count(){
        return bitcoin\blockchain\get_block_count($this->bitcoin_instance);
    }

    function get_block_hash($height){
        return bitcoin\blockchain\get_block_hash($this->bitcoin_instance, $height);
    }

    function get_block_header($blockhash, $verbose = false){
        return bitcoin\blockchain\get_block_header($this->bitcoin_instance, $blockhash, $verbose);
    }

    function get_block_stats($hash_or_height, $stats = null){
        return bitcoin\blockchain\get_block_stats($this->bitcoin_instance, $hash_or_height, $stats);
    }
    #endregion

    #region chains
    function get_blockchain_info(){
        return bitcoin\blockchain\get_blockchain_info($this->bitcoin_instance);
    }

    function get_chain_tips(){
        return bitcoin\blockchain\get_chain_tips($this->bitcoin_instance);
    }

    function get_chain_tx_stats($nblocks = null, $blockhash = null){
        return bitcoin\blockchain\get_chain_tx_stats($this->bitcoin_instance, $nblocks, $blockhash);
    }

    function verify_chain($check_level = 3, $nblocks = 6){
        return bitcoin\blockchain\verify_chain($this->bitcoin_instance, $check_level, $nblocks);
    }
    #endregion

    #region mem_pool
    function get_mem_pool_ancestors($tx_id, $verbose = false){
        return bitcoin\blockchain\get_mem_pool_ancestors($this->bitcoin_instance, $tx_id, $verbose);
    }

    function get_mem_pool_descendants($tx_id, $verbose = false){
        return bitcoin\blockchain\get_mem_pool_descendants($this->bitcoin_instance, $tx_id, $verbose);
    }

    function get_mem_pool_entry($tx_id){
        return bitcoin\blockchain\get_mem_pool_entry($this->bitcoin_instance, $tx_id);
    }

    function get_mem_pool_info(){
        return bitcoin\blockchain\get_mem_pool_info($this->bitcoin_instance);
    }

    function get_raw_mem_pool($verbose = false){
        return bitcoin\blockchain\get_raw_mem_pool($this->bitcoin_instance, $verbose);
    }

    function save_mem_pool(){
        bitcoin\blockchain\save_mem_pool($this->bitcoin_instance);
    }
    #endregion

    #region tx_out
    function get_tx_out($tx_id, $vout_number, $include_mem_pool = false){
        return bitcoin\blockchain\get_tx_out($this->bitcoin_instance, $tx_id, $vout_number, $include_mem_pool);
    }

    function get_tx_out_proof(array $tx_id){
        return bitcoin\blockchain\get_tx_out_proof($this->bitcoin_instance, $tx_id);
    }

    function get_tx_out_set_info(){
        return bitcoin\blockchain\get_tx_out_set_info($this->bitcoin_instance);
    }

    function verify_tx_out_proof($proof){
        return bitcoin\blockchain\verify_tx_out_proof($this->bitcoin_instance, $proof);
    }
    #endregion
}