# bitcoin_rpc_wrapper
 not complete php wrapper for the rpc bitcoin api

```php
<?php
//example! :

require 'bitcoin/autoload.php'; // or require 'vendor/autoload.php'; (composer)

$bitcoin_instance = new bitcoin\bitcoin('http://127.0.0.1:8332', 'user', 'pass');

$address_stuff = $bitcoin_instance->wallet->address;

print_r($address_stuff->get_info('1GksJA2LTemR8MRAH76sf6aMC8m1CUk3Ge'));

?>
```
composer usage : 
> composer require finguimbrine/bitcoin-rpc-wrapper:dev-master
