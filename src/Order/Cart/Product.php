<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:47
 */

namespace Reis\SteloSdk\Order\Cart;


use Reis\SteloSdk\Contract\Arrayable;

class Product implements Arrayable
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
        $this->setProductSku($productSku);
        $this->setProductName($productName);
        $this->setProductPrice($productPrice);
        $this->setProductQuantity($productQuantity);
    }

    /**
     * @param string $productSku
     * @return Product
     */
    public function setProductSku($productSku)
    {
        $this->productSku = (string)$productSku;
        return $this;
    }

    /**
     * @param string $productName
     * @return Product
     */
    public function setProductName($productName)
    {
        $this->productName = (string)$productName;
        return $this;
    }

    /**
     * @param float $productPrice
     * @return Product
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = (double)$productPrice;
        return $this;
    }

    /**
     * @param float $productQuantity
     * @return Product
     */
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = (double)$productQuantity;
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