<?php
namespace bitcoin;

use Exception;

class bitcoin_exception extends Exception { }

class bitcoin{
    private $service_url, $rpcuser, $rpcpass;

    // http://127.0.0.1:8332/ ( service url example )
    function __construct($service_url, $rpcuser = null, $rpcpass = null){
        $this->service_url = $service_url;

        $this->rpcuser = $rpcuser;
        $this->rpcpass = $rpcpass;

        $this->blockchain = new blockchain\blockchain($this);
        $this->generating = new generating\generating($this);
        $this->raw_transaction = new raw_transaction\raw_transaction($this);
        $this->util = new utils\util($this);

        /*
        check these :
            https://en.bitcoin.it/wiki/Running_Bitcoin
            https://github.com/bitcoin/bitcoin/blob/master/share/examples/bitcoin.conf
        */
    }

    function do_request(string $method, array $data = []){
        $curl_instance = curl_init($this->service_url);

        $post_data = json_encode(array(
            'jsonrpc' => '1.0',
            'id' => '1337', // i don't know about this id thing, edit to whatever you want
            'method' => $method,
            'params' => $data
        ));

        curl_setopt($curl_instance, CURLOPT_POST, true);
        curl_setopt($curl_instance, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl_instance, CURLOPT_RETURNTRANSFER, true);

        if($this->rpcuser !== null && $this->rpcpass !== null)
            curl_setopt($curl_instance, CURLOPT_USERPWD, "$this->rpcuser:$this->rpcpass");

        $response = curl_exec($curl_instance);

        $decoded_response = json_decode($response, true);

        if(isset($decoded_response['error']) && $decoded_response['error'] !== null)
            throw new bitcoin_exception($decoded_response['error']['message'], $decoded_response['error']['code']);

        if(curl_errno($curl_instance))
            throw new bitcoin_exception(curl_error($curl_instance));

        curl_close($curl_instance);

        return $decoded_response['result'];
    }

    public $blockchain, $generating, $raw_transaction, $util;
}
