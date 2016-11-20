<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:12
 */

namespace Reis\SteloSdk\Customer;


use Reis\SteloSdk\Contract\Arrayable;

class ShippingAddress extends Address implements Arrayable
{
    /**
     * @var null|string $receiver Recebedor
     */
    protected $receiver;

    /**
     * ShippingAddress constructor.
     * @param null|string $receiver Recebedor
     */
    public function __construct($street = null, $number = null, $complement = null, $neighborhood = null, $zipCode = null, $city = null, $state = null, $country = null, $receiver = null)
    {
        parent::__construct($street, $number, $complement, $neighborhood, $zipCode, $city, $state, $country);
        $this->setReceiver($receiver);
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

    /**
     * Returns a array representation of the object.
     *
     * @return array
     */
    public function toArray()
    {
        $andress = parent::toArray();
        $andress['receiver'] = $this->receiver;
        return $andress;
    }
}