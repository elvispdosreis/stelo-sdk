<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:46
 */

namespace Reis\SteloSdk;


use Reis\SteloSdk\Customer\BillingAddress;
use Reis\SteloSdk\Customer\ShippingAddress;
use Reis\SteloSdk\Phone\Phone;

class Customer
{
    /**
     * @var string CPF do cliente
     */
    private $customerIdentity;
    /**
     * @var string Nome do cliente
     */
    private $customerName;
    /**
     * @var string E-mail do cliente
     */
    private $customerEmail;
    /**
     * @var string Data de nascimento
     */
    private $birthDate;
    /**
     * @var string Sexo (m ou f)
     */
    private $gender;
    /**
     * @var BillingAddress Endereço de cobrança
     */
    private $billingAddress;
    /**
     * @var ShippingAddress Endereço de entrega
     */
    private $shippingAddress;
    /**
     * @var Phone Dados de telefones
     */
    private $phoneData;
}