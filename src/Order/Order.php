<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:46
 */

namespace Reis\SteloSdk\Order;


use Reis\SteloSdk\Contract\Arrayable;

class Order implements Arrayable
{
    /*
    * Prazo de entrega em tempo médio (de 2 à 10 das úteis)
    */
    const SHIPPING_DEFAULT = 'Default';

    /*
     * Prazo de entregas feitas entre 12 horas e 2 dias úteis após a aprovação
     */
    const SHIPPING_Fast = 'Fast';

    /*
     * Prazo de entregas feitas entre 12 horas e 2 dias úteis após a aprovação
     */
    const SHIPPING_EXPRESS = 'Express';

    /*
     * Prazo de entrega acima de 10 dias úteis
     */
    const SHIPPING_EXTENSIVE = 'Extensive';

    /*
     * Produto será retirado em loja
     */
    const SHIPPING_STOREPICKUP = 'storePickup';

    /*
     * Produto digital
     */
    const SHIPPING_DIGITAL = 'digital';

    /*
     * Produto será retirado em loja
     */
    const SHIPPING_SERVICE = 'Serviço';

    /**
     * @var string
     */
    private $shippingBehavior;
    /**
     * @var string
     */
    private $orderId;
    /**
     * @var string
     */
    private $secureCode;

    /**
     * Order constructor.
     * @param string $shippingBehavior
     * @param string $orderId
     * @param string $secureCode
     */
    public function __construct($shippingBehavior = self::SHIPPING_DEFAULT, $orderId = null, $secureCode = null)
    {
        $this->shippingBehavior = $shippingBehavior;
        $this->orderId = $orderId;
        $this->secureCode = $secureCode;
    }

    /**
     * @param string $shippingBehavior
     */
    public function setShippingBehavior($shippingBehavior = self::SHIPPING_DEFAULT)
    {
        $this->shippingBehavior = $shippingBehavior;
        return $this;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @param string $secureCode
     */
    public function setSecureCode($secureCode)
    {
        $this->secureCode = $secureCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecureCode()
    {
        if(is_null($this->secureCode)){
            self::setSecureCode(time());
        }
        return $this->secureCode;
    }



    /**
     * Returns a array representation of the object.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'shippingBehavior' => $this->shippingBehavior,
            'orderId' => $this->orderId,
            'secureCode' => $this->getSecureCode()
        ];
    }
}