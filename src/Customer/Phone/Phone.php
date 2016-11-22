<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:17
 */

namespace Reis\SteloSdk\Customer\Phone;


use Reis\SteloSdk\Contract\Arrayable;

class Phone implements Arrayable
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
        $this->setType($type);
        $this->setAreaCode($areaCode);
        $this->setNumber($number);
    }

    /**
     * @param string $type
     * @return Phone
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param int $areaCode
     * @return Phone
     */
    public function setAreaCode($areaCode)
    {
        $areaCode = preg_replace("/[^0-9]/", "", $areaCode);
        $this->areaCode = (string)$areaCode;
        return $this;
    }

    /**
     * @param int $number
     * @return Phone
     */
    public function setNumber($number)
    {
        $number = preg_replace("/[^0-9]/", "", $number);
        $this->number = (string)$number;
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
            'type' => $this->type,
            'areaCode' => $this->areaCode,
            'number' => $this->number
        ];
    }


}