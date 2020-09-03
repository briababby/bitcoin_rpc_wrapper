<?php
$dir = __DIR__ . '/';

foreach(glob($dir.'*.php') as $php_file)
    include_once $php_file;

foreach(glob($dir.'blockchain/*.php') as $php_file)
    include_once $php_file;

foreach(glob($dir.'blockchain/responses/*.php') as $php_file)
    include_once $php_file;

foreach(glob($dir.'raw_transaction/*.php') as $php_file)
    include_once $php_file;

foreach(glob($dir.'raw_transaction/responses/*.php') as $php_file)
    include_once $php_file;

foreach(glob($dir.'generating/*.php') as $php_file)
    include_once $php_file;