<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:17
 */

namespace Reis\SteloSdk\Phone;


class Phone
{
    /**
     * @var array
     */
    private $itens = [];


    public function __construct()
    {
        $this->itens = [];
    }

    /**
     * @param Item $item
     * @return Phone
     */
    public function setItem(Item $item)
    {
        $this->itens[] = $item;
        return $this;
    }


}