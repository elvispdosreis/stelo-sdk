<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 22:19
 */

namespace Reis\SteloSdk\Order;

use Reis\SteloSdk\Contract\Arrayable;

class Card implements Arrayable
{
    /**
     * @var string Número do Cartão de Crédito
     */
    private $number;
    /**
     * @var string Nome do Cliente como está no Cartão
     */
    private $embossing;
    /**
     * @var string Data de expiração no formato MM-YYYY(01-2014)
     */
    private $expiryDate;
    /**
     * @var string CVV do Cartão de Crédito
     */
    private $cvv;

    /**
     * Cart constructor.
     * @param string $number
     * @param string $embossing
     * @param string $expiryDate
     * @param string $cvv
     */
    public function __construct($number = null, $embossing = null, $expiryDate = null, $cvv = null)
    {
        $this->number = $number;
        $this->embossing = $embossing;
        $this->expiryDate = $expiryDate;
        $this->cvv = $cvv;
    }

    /**
     * @param string $number
     * @return Cart
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @param string $embossing
     * @return Cart
     */
    public function setEmbossing($embossing)
    {
        $this->embossing = $embossing;
        return $this;
    }

    /**
     * @param string $expiryDate
     * @return Cart
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
        return $this;
    }

    /**
     * @param string $cvv
     * @return Cart
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
        return $this;
    }

    /**
     * Returns a array representation of the object.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'number' => $this->number,
            'embossing' => $this->embossing,
            'expiryDate' => $this->expiryDate,
            'cvv' => $this->cvv
        ];
    }

}