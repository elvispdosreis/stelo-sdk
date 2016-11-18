<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:47
 */

namespace Reis\SteloSdk\Order\Cart;


use Reis\SteloSdk\Contract\Arrayable;

class Cart implements Arrayable
{
    /**
     * @var array
     */
    private $itens = array();

    /**
     * Item constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->itens[] = $item;
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