<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 22/11/2016
 * Time: 11:13
 */

namespace Reis\SteloSdk\Order;


class OrderDataResult
{
    private $orderId;
    private $nsu;
    private $tid;
    private $cardNumber;

    /**
     * OrderDataResult constructor.
     * @param string $orderId
     * @param string $nsu
     * @param string $tid
     * @param string $cardNumber
     */
    public function __construct($orderId, $nsu, $tid, $cardNumber)
    {
        $this->orderId = sprintf('%0.0f', $orderId);
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
     * @return OrderDataResult
     */
    public function setOrderId($orderId)
    {
        $this->orderId = sprintf('%0.0f', $orderId);
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
     * @return OrderDataResult
     */
    public function setNsu($nsu)
    {
        $this->nsu = $nsu;
        return $this;
    }

    /**
     * @return string
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * @param string $tid
     * @return OrderDataResult
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
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
     * @return OrderDataResult
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }


}