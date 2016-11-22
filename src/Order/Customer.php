<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:46
 */

namespace Reis\SteloSdk\Order;


use Reis\SteloSdk\Contract\Arrayable;
use Reis\SteloSdk\Customer\BillingAddress;
use Reis\SteloSdk\Customer\Phone\Phone;
use Reis\SteloSdk\Customer\ShippingAddress;
use Reis\SteloSdk\Customer\Phone\PhoneData;

class Customer implements Arrayable
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
     * @var PhoneData Dados de telefones
     */
    private $phoneData;

    /**
     * Customer constructor.
     * @param string $customerIdentity
     * @param string $customerName
     * @param string $customerEmail
     * @param string $birthDate
     * @param string $gender
     * @param BillingAddress $billingAddress
     * @param ShippingAddress $shippingAddress
     * @param PhoneData $phoneData
     */
    public function __construct($customerIdentity = null, $customerName = null, $customerEmail = null, $birthDate = null, $gender = null, BillingAddress $billingAddress = null, ShippingAddress $shippingAddress = null, PhoneData $phoneData = null)
    {
        $this->setCustomerIdentity($customerIdentity);
        $this->setCustomerName($customerName);
        $this->setCustomerEmail($customerEmail);
        $this->setBirthDate($birthDate);
        $this->setGender($gender);
        if($billingAddress instanceof BillingAddress) {
            $this->setBillingAddress($billingAddress);
        }
        if($shippingAddress instanceof ShippingAddress) {
            $this->setShippingAddress($shippingAddress);
        }
        if($phoneData instanceof PhoneData) {
            $this->setPhoneData($phoneData);
        }
    }

    /**
     * @param string $customerIdentity
     * @return Customer
     */
    public function setCustomerIdentity($customerIdentity)
    {
        $customerIdentity = preg_replace("/[^0-9]/", "", $customerIdentity);
        $this->customerIdentity = $customerIdentity;
        return $this;
    }

    /**
     * @param string $customerName
     * @return Customer
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
        return $this;
    }

    /**
     * @param string $customerEmail
     * @return Customer
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
        return $this;
    }

    /**
     * @param string $birthDate
     * @return Customer
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @param string $gender
     * @return Customer
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @param BillingAddress $billingAddress
     * @return Customer
     */
    public function setBillingAddress(BillingAddress &$billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    /**
     * @param ShippingAddress $shippingAddress
     * @return Customer
     */
    public function setShippingAddress(ShippingAddress &$shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    /**
     * @param PhoneData $phoneData
     * @return Customer
     */
    public function setPhoneData(PhoneData &$phoneData)
    {
        $this->phoneData = $phoneData;
        return $this;
    }

    /**
     * @param Phone $phone
     * @return Customer
     */
    public function addPhone(Phone &$phone)
    {
        if(is_null($this->phoneData)){
            $this->phoneData = new PhoneData();
        }
        $this->phoneData->setItem($phone);
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
            'customerIdentity' => $this->customerIdentity,
            'customerName' => $this->customerName,
            'customerEmail' => $this->customerEmail,
            'birthDate' => $this->birthDate,
            'gender' => $this->gender,
            'billingAddress' => $this->billingAddress->toArray(),
            'shippingAddress' => $this->shippingAddress->toArray(),
            'phoneData' => $this->phoneData->toArray(),
        ];
    }
}