<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 21:56
 */
require __DIR__ . '/config.php';
require __DIR__ . '/../vendor/autoload.php';

use Reis\SteloSdk\Stelo;

$transaction = new Stelo(Stelo::SANDBOX, CLIENT_ID, SECRET_ID);
print_r($transaction->deleteTransaction(''));
