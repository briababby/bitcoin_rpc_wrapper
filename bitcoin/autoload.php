<?php
$dir = __DIR__ . '/';

$patterns = array(
    $dir.'*.php',
    $dir.'blockchain/*.php',
    $dir.'blockchain/responses/*.php',
    $dir.'raw_transaction/*.php',
    $dir.'raw_transaction/responses/*.php',
    $dir.'util/*.php',
    $dir.'util/responses/*.php',
    $dir.'generating/*.php',
    $dir.'wallet/*.php',
    $dir.'wallet/responses/*.php'
);

foreach($patterns as $pattern)
    foreach(glob($pattern) as $single_file)
        include_once $single_file;
