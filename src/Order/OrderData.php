<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 21/11/2016
 * Time: 22:19
 */

namespace Reis\SteloSdk\Order;


class OrderData
{
    /**
     * @var string
     */
    private $orderId;
    /**
     * @var string
     */
    private $nsu;
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $cardNumber;

    /**
     * OrderData constructor.
     * @param $orderId string
     * @param $nsu string
     * @param $tid string
     * @param $cardNumber string
     */
    public function __construct($orderId, $nsu, $tid, $cardNumber)
    {
        $this->orderId = $orderId;
        $this->nsu = $nsu;
        $this->tid = $tid;
        $this->cardNumber = $cardNumber;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return OrderData
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getNsu()
    {
        return $this->nsu;
    }

    /**
     * @param string $nsu
     * @return OrderData
     */
    public function setNsu($nsu)
    {
        $this->nsu = $nsu;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return OrderData
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     * @return OrderData
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }




}