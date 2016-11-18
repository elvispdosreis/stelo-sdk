<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:17
 */

namespace Reis\SteloSdk\Phone;


use Reis\SteloSdk\Contract\Arrayable;

class Item implements Arrayable
{
    /**
     * Fixo
     */
    const TYPE_FIXO = 'LANDLINE';
    /**
     * Celular
     */
    const TYPE_CELL = 'CELL';
    /**
     * @var string Tipo
     */
    private $type;
    /**
     * @var int Número do DDD
     */
    private $areaCode;
    /**
     * @var int Número de telefone
     */
    private $number;

    /**
     * Item constructor.
     * @param string $type
     * @param int $areaCode
     * @param int $number
     */
    public function __construct($type = self::TYPE_FIXO, $areaCode = null, $number = null)
    {
        $this->type = $type;
        $this->areaCode = $areaCode;
        $this->number = $number;
    }

    /**
     * @param string $type
     * @return Item
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param int $areaCode
     * @return Item
     */
    public function setAreaCode($areaCode)
    {
        $this->areaCode = $areaCode;
        return $this;
    }

    /**
     * @param int $number
     * @return Item
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
            'type' => $this->$this->type,
            'areaCode' => $this->areaCode,
            'number' => $this->number
        ];
    }


}