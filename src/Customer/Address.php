<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:05
 */

namespace Reis\SteloSdk\Customer;


class Address
{
    /**
     * @var string|null Rua
     */
    private $street;
    /**
     * @var string|null Numero
     */
    private $number;
    /**
     * @var string|null Bairro
     */
    private $complement;
    /**
     * @var string|null Complemento
     */
    private $neighborhood;
    /**
     * @var string|null Cep
     */
    private $zipCode;
    /**
     * @var string|null Cidade
     */
    private $city;
    /**
     * @var string|null Estado
     */
    private $state;
    /**
     * @var string|null Pais
     */
    private $country;

    /**
     * Address constructor.
     * @param null|string $street
     * @param null|string $number
     * @param null|string $complement
     * @param null|string $neighborhood
     * @param null|string $zipCode
     * @param null|string $city
     * @param null|string $state
     * @param null|string $country
     */
    public function __construct($street, $number, $complement, $neighborhood, $zipCode, $city, $state, $country)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
        $this->neighborhood = $neighborhood;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    /**
     * @param null|string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @param null|string $number
     * @return Address
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @param null|string $complement
     * @return Address
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;
        return $this;
    }

    /**
     * @param null|string $neighborhood
     * @return Address
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * @param null|string $zipCode
     * @return Address
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @param null|string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param null|string $state
     * @return Address
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param null|string $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
}