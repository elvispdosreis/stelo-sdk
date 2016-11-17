<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:45
 */

namespace Reis\SteloSdk;


use Reis\SteloSdk\Cart\Cart;

class Payment
{
    /**
     * @var double
     */
    private $amount;
    /**
     * @var double
     */
    private $discountAmount;
    /**
     * @var double
     */
    private $freight;
    /**
     * @var string
     */
    private $currency;
    /**
     * @var int
     */
    private $installment;
    /**
     * @var Cart
     */
    private $cartData;
    /**
     * @var string
     */
    private $paymentType;
    /**
     * @var string
     */
    private $cardData;

}