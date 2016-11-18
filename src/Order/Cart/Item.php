<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:47
 */

namespace Reis\SteloSdk\Order\Cart;


use Reis\SteloSdk\Contract\Arrayable;

class Item implements Arrayable
{
    /**
     * @var string
     */
    private $productSku;
    /**
     * @var string
     */
    private $productName;
    /**
     * @var double
     */
    private $productPrice;
    /**
     * @var double
     */
    private $productQuantity;


    /**
     * Cart constructor.
     * @param string $productSku
     * @param string $productName
     * @param float $productPrice
     * @param float $productQuantity
     */
    public function __construct($productSku = '', $productName = '', $productPrice = 0, $productQuantity = 0)
    {
        $this->productSku = $productSku;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->productQuantity = $productQuantity;
    }

    /**
     * @param string $productSku
     * @return Cart
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;
        return $this;
    }

    /**
     * @param string $productName
     * @return Cart
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * @param float $productPrice
     * @return Cart
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;
        return $this;
    }

    /**
     * @param float $productQuantity
     * @return Cart
     */
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;
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
            'productSku' => $this->productSku,
            'productName' => $this->productName,
            'productPrice' => $this->productPrice,
            'productQuantity' => $this->productQuantity
        ];
    }
}