<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:17
 */

namespace Reis\SteloSdk\Phone;


class Item
{
    /**
     * Fixo
     */
    const TYPE_LANDLINE = 'LANDLINE';
    /**
     * Celular
     */
    const TYPE_CELL = 'CELL';
    /**
     * @var string
     */
    private $type;
    /**
     * @var int
     */
    private $areaCode;
    /**
     * @var int
     */
    private $number;


}