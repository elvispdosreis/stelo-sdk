<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:17
 */

namespace Reis\SteloSdk\Phone;


use Reis\SteloSdk\Contract\Arrayable;

class Phone implements Arrayable
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