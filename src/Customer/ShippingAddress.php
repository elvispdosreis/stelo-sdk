<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:12
 */

namespace Reis\SteloSdk\Customer;


class ShippingAddress extends Address
{
    /**
     * @var null|string $receiver
     */
    protected $receiver;

    /**
     * ShippingAddress constructor.
     * @param null|string $receiver
     */
    public function __construct($street, $number, $complement, $neighborhood, $zipCode, $city, $state, $country, $receiver)
    {
        parent::__construct($street, $number, $complement, $neighborhood, $zipCode, $city, $state, $country);
        $this->receiver = $receiver;
    }

    /**
     * @param null|string $receiver
     * @return ShippingAddress
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

}