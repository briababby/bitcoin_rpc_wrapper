<?php
namespace bitcoin\wallet\responses;

class label{
    public $name, $purpose;

    function __construct(array $data){
        $this->name = $data['name'] ?? null;

        $this->purpose = $data['purpose'] ?? null;
    }
}

class address{
    public $address, $script_pub_key,
        $is_mine, $is_watch_only, $solvable, $desc,
            $is_script, $is_change, $is_witness,
                $witness_version, $witness_program;

    public $script, $hex;

    public $pubkeys, $labels;

    public $sigs_required, $pub_key, $embedded,
        $is_compressed, $label, $timestamp, $hd_key_path, $hd_seed_id,
            $hd_master_fingerprint;

    function __construct(array $data){
        $this->address = $data['address'] ?? null;
        $this->script_pub_key = $data['scriptPubKey'] ?? null;

        $this->is_mine = $data['ismine'] ?? null;
        $this->is_watch_only = $data['iswatchonly'] ?? null;
        $this->solvable = $data['solvable'] ?? null;

        $this->desc = $data['desc'] ?? null;

        $this->is_script = $data['isscript'] ?? null;
        $this->is_change = $data['ischange'] ?? null;
        $this->is_witness = $data['iswitness'] ?? null;

        $this->witness_version = $data['witness_version'] ?? null;
        $this->witness_program = $data['witness_program'] ?? null;
        $this->script = $data['script'] ?? null;
        $this->hex = $data['hex'] ?? null;

        $this->pubkeys = $data['pubkeys'] ?? [];

        $this->sigs_required = $data['sigsrequired'] ?? null;
        $this->pub_key = $data['pubkey'] ?? null;

        $this->embedded = $data['embedded'] ?? null;

        $this->is_compressed = $data['iscompressed'] ?? null;
        $this->label = $data['label'] ?? null;
        $this->timestamp = $data['timestamp'] ?? null;

        $this->hd_key_path = $data['hdkeypath'] ?? null;
        $this->hd_seed_id = $data['hdseedid'] ?? null;
        $this->hd_master_fingerprint = $data['hdmasterfingerprint'] ?? null;

        $labels = $data['labels'] ?? null;

        if($labels !== null)
            foreach($labels as $single)
                $this->labels[] = new label($single);
    }
}