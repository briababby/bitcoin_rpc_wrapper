<?php
namespace bitcoin\blockchain\responses;

class tx_statistics {
    public $time, $tx_count, $tx_rate,
        $window_final_block_hash, $window_block_count, $window_tx_count,
            $window_interval;

    function __construct(array $data){
        $this->time = $data['time'] ?? null;

        $this->tx_count = $data['txcount'] ?? null;
        $this->tx_rate = $data['txrate'] ?? null;

        $this->window_final_block_hash = $data['window_final_block_hash'] ?? null;
        $this->window_block_count = $data['window_block_count'] ?? null;
        $this->window_tx_count = $data['window_tx_count'] ?? null;
        $this->window_interval = $data['window_interval'] ?? null;
    }
}