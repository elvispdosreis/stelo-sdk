<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:17
 */

namespace Reis\SteloSdk\Customer\Phone;


use Reis\SteloSdk\Contract\Arrayable;

class PhoneData implements Arrayable
{
    /**
     * @var array
     */
    private $itens = [];

    public function __construct(Phone $item = null)
    {
        if ($item instanceof Phone) {
            $this->setItem($item);
        }
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->itens;
    }

    /**
     * @param Phone $item
     * @return PhoneData
     */
    public function setItem(Phone &$item)
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