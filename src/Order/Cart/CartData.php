<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:47
 */

namespace Reis\SteloSdk\Order\Cart;


use Reis\SteloSdk\Contract\Arrayable;

class CartData implements Arrayable
{
    /**
     * @var array
     */
    private $itens = [];

    /**
     * Item constructor.
     * @param Product $item
     */
    public function __construct(Product $item = null)
    {
        if ($item instanceof Product) {
            $this->setItem($item);
        }
    }

    /**
     * @param Product $item
     * @return CartData
     */
    public function setItem(Product &$item)
    {
        $this->itens[] = $item;
        return $this;
    }

    /**
     * Returns a array representation of the object.
     *
     * @return array
     */
    public function toArray()
    {
        $itens = [];
        foreach ($this->itens as $key => $value) {
            $itens[$key] = $value->toArray();
        }
        return $itens;
    }


}