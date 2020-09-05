<?php
namespace bitcoin\wallet;

use bitcoin;

class wallet{
    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->management = new i_management($bitcoin_instance);

        $this->transaction = new i_transaction($bitcoin_instance);

        $this->address = new i_address($bitcoin_instance);
    }
    public $management, $transaction, $address;
}
#region org
class i_management {
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function backup($destination){
        return backup_wallet($this->bitcoin_instance, $destination);
    }

    function create($wallet_name, $disable_private_keys = false, $blank = false){
        return create_wallet($this->bitcoin_instance, $wallet_name, $disable_private_keys, $blank);
    }

    function dump($file_name){
        return dump_wallet($this->bitcoin_instance, $file_name);
    }

    function encrypt($pass_phrase){
        encrypt_wallet($this->bitcoin_instance, $pass_phrase);
    }

    function balance($dummy = '*', $min_conf = 0, $include_watchonly = false){
        return get_balance($this->bitcoin_instance, $dummy, $min_conf, $include_watchonly);
    }

    function info(){
        return get_wallet_info($this->bitcoin_instance);
    }

    function import($file_name){
        import_wallet($this->bitcoin_instance, $file_name);
    }

    function list_all(){
        return list_wallets($this->bitcoin_instance);
    }

    function load($file_name){
        return load_wallet($this->bitcoin_instance, $file_name);
    }

    function unload($file_name){
        unload_wallet($this->bitcoin_instance, $file_name);
    }

    function lock(){
        wallet_lock($this->bitcoin_instance);
    }

    function pass_phrase($pass_phrase, $timeout){
        wallet_pass_phrase($this->bitcoin_instance, $pass_phrase, $timeout);
    }
    
    function change_pass_phrase($old_pass_phrase, $new_pass_phrase){
        wallet_pass_phrase_change($this->bitcoin_instance, $old_pass_phrase, $new_pass_phrase);
    }

}

class i_transaction {
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function abandon($tx_id){
        abandon_transaction($this->bitcoin_instance, $tx_id);
    }

    function get($tx_id, $include_watchonly = false){
        return get_transaction($this->bitcoin_instance, $tx_id, $include_watchonly);
    }

    function list_all($label = '*', $count = 10, $skip = 0, $include_watchonly = false){
        return list_transactions($this->bitcoin_instance, $label, $count, $skip, $include_watchonly);
    }
}

class i_address{
    private bitcoin\bitcoin $bitcoin_instance;

    function __construct(bitcoin\bitcoin $bitcoin_instance){
        $this->bitcoin_instance = $bitcoin_instance;
    }

    function dump_private_key($address){
        return dump_private_key($this->bitcoin_instance, $address);
    }

    function get_addresses_by_label($label){
        return get_addresses_by_label($this->bitcoin_instance, $label);
    }

    function get_info($address){
        return get_address_info($this->bitcoin_instance, $address);
    }

    function get_new_address($label = '', $address_type = ''){
        return get_new_address($this->bitcoin_instance, $label, $address_type);
    }

    function get_raw_change_address($address_type = ''){
        return get_raw_change_address($this->bitcoin_instance, $address_type);
    }

    function get_received_by_address($address, $min_conf = 1){
        return get_received_by_address($this->bitcoin_instance, $address, $min_conf);
    }

    function get_received_by_label($label = '', $min_conf = 1){
        return get_received_by_label($this->bitcoin_instance, $label, $min_conf);
    }

    function send_to_address
    ($address, $amount, $comment = '', $comment_to = '', $subtract_fee_from_amount = false){
        return send_to_address($this->bitcoin_instance, $address, $amount, $comment, $comment_to, $subtract_fee_from_amount);
    }

    function send_to_many($dummy, array $amounts, $min_conf = 1, $comment = '', array $subtract_fee_from = []){
        return send_to_many($this->bitcoin_instance, $dummy, $amounts, $min_conf, $comment, $subtract_fee_from);
    }

    function set_label($address, $label){
        set_label($this->bitcoin_instance, $address, $label);
    }

    function sign_message($address, $message){
        return sign_message($this->bitcoin_instance, $address, $message);
    }
}
#endregion
