<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 20/11/2016
 * Time: 11:32
 */

namespace Reis\SteloSdk\Order;


use Reis\SteloSdk\Contract\Arrayable;

class CardData implements Arrayable
{
    private $token = null;

    /**
     * CardToken constructor.
     * @param null $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param null $token
     * @return CardData
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function toArray()
    {
        return [
            'token' => $this->getToken()
        ];
    }

}