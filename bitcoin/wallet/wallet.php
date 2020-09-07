<?php
namespace bitcoin\wallet;

use bitcoin;

function backup_wallet(bitcoin\bitcoin $bitcoin_instance, $destination){
    $bitcoin_instance->do_request('backupwallet', [$destination]);
}

function create_wallet(bitcoin\bitcoin $bitcoin_instance, $wallet_name, $disable_private_keys = false, $blank = false){
    $json_response = $bitcoin_instance->do_request('createwallet', [$wallet_name, $disable_private_keys, $blank]);

    if(isset($json_response['warning']) && $json_response['warning'] != null)
        trigger_error($json_response['warning'], E_USER_WARNING);

    return (string)$json_response['name'];
}

function dump_wallet(bitcoin\bitcoin $bitcoin_instance, $file_name){
    return (string)$bitcoin_instance->do_request('dumpwallet', [$file_name])['filename'];
}

function encrypt_wallet(bitcoin\bitcoin $bitcoin_instance, $pass_phrase){
    $bitcoin_instance->do_request('encryptwallet', [$pass_phrase]);
}

function get_balance(bitcoin\bitcoin $bitcoin_instance, $dummy = '*', $min_conf = 0, $include_watchonly = false){
    return (int)$bitcoin_instance->do_request('getbalance', [$dummy, $min_conf, $include_watchonly]);
}

function get_wallet_info(bitcoin\bitcoin $bitcoin_instance){
    return (array)$bitcoin_instance->do_request('getwalletinfo');
}

function import_wallet(bitcoin\bitcoin $bitcoin_instance, $file_name){
    $bitcoin_instance->do_request('importwallet', [$file_name]);
}

function list_wallets(bitcoin\bitcoin $bitcoin_instance){
    return (array)$bitcoin_instance->do_request('listwallets');
}

function load_wallet(bitcoin\bitcoin $bitcoin_instance, $file_name){
    $json_response = $bitcoin_instance->do_request('loadwallet', [$file_name]);

    if(isset($json_response['warning']) && $json_response['warning'] != null)
        trigger_error($json_response['warning'], E_USER_WARNING);

    return (string)$json_response['name'];
}

function unload_wallet(bitcoin\bitcoin $bitcoin_instance, $wallet_name){
    $bitcoin_instance->do_request('unloadwallet', [$wallet_name]);
}

function wallet_lock(bitcoin\bitcoin $bitcoin_instance){
    $bitcoin_instance->do_request('walletlock');
}

function wallet_pass_phrase(bitcoin\bitcoin $bitcoin_instance, $pass_phrase, $timeout){
    // 'unlock' wallet (store the dec key in memory for the certain timeout time)
    $bitcoin_instance->do_request('walletpassphrase', [$pass_phrase, $timeout]);
}

function wallet_pass_phrase_change(bitcoin\bitcoin $bitcoin_instance, $old_pass_phrase, $new_pass_phrase){
    $bitcoin_instance->do_request('walletpassphrasechange', [$old_pass_phrase, $new_pass_phrase]);
}
