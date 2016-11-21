<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 21:56
 */
require __DIR__ . '/config.php';
require __DIR__ . '/../vendor/autoload.php';

use Reis\SteloSdk\Order\Card;
use Reis\SteloSdk\Stelo;

$card = new Card();
$card->setNumber('4066553613548107');
$card->setEmbossing('Fulano');
$card->setExpiryDate('10/17');
$card->setCvv('903');

$transaction = new Stelo(Stelo::SANDBOX, CLIENT_ID, SECRET_ID);
print_r($transaction->sendToken($card));
