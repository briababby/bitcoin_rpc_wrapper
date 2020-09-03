<?php
namespace bitcoin\blockchain\responses;

class fees{
    public $base, $modified, $ancestor, $descendant;

    function __construct(array $data){
        $this->base = $data['base'];

        $this->modified = $data['modified'];

        $this->ancestor = $data['ancestor'];

        $this->descendant = $data['descendant'];
    }
}

class mem_pool {
    public $size, $fee, $modified_fee, $time, $height,
        $descendant_count, $descendant_size, $descendant_fees,
        $ancestor_count, $ancestor_size, $ancestor_fees, $wtx_id;

    public $fees;

    public $depends, $spent_by;

    public $bip125_replaceable;

    function __construct(array $data)
    {
        $this->size = $data['size'] ?? null;
        $this->fee = $data['fee'] ?? null;
        $this->modified_fee = $data['modifiedfee'] ?? null;
        $this->time = $data['time'] ?? null;
        $this->height = $data['height'] ?? null;

        $this->descendant_count = $data['descendantcount'] ?? null;
        $this->descendant_size = $data['descendantsize'] ?? null;
        $this->descendant_fees = $data['descendantfees'] ?? null;

        $this->ancestor_count = $data['ancestorcount'] ?? null;
        $this->ancestor_size = $data['ancestorsize'] ?? null;
        $this->ancestor_fees = $data['ancestorfees'] ?? null;

        $this->wtx_id = $data['wtxid'] ?? null;

        $this->fees = new fees($data['fees'] ?? null);

        $depends = $data['fees'] ?? null;

        if ($depends !== null)
            foreach ($depends as $transaction_id)
                $this->depends[] = $transaction_id;

        $spentby = $data['spentby'] ?? null;

        if ($spentby !== null)
            foreach ($spentby as $transaction_id)
                $this->spent_by[] = $transaction_id;

        $this->bip125_replaceable = $data['bip125-replaceable'] ?? null;
    }
}
