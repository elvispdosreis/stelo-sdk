<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:47
 */

namespace Reis\SteloSdk\Cart;


class Cart
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


}