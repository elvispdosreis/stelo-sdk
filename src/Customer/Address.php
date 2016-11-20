<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 15:05
 */

namespace Reis\SteloSdk\Customer;


use Reis\SteloSdk\Contract\Arrayable;

class Address implements Arrayable
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
     * @param null|string $street Rua
     * @param null|string $number Numero
     * @param null|string $complement Complemento
     * @param null|string $neighborhood Bairro
     * @param null|string $zipCode Cep
     * @param null|string $city Cidade
     * @param null|string $state Estado
     * @param null|string $country Pais
     */
    public function __construct($street = null, $number = null, $complement = null, $neighborhood = null, $zipCode = null, $city = null, $state = null, $country = null)
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

    /**
     * Returns a array representation of the object.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'neighborhood' => $this->neighborhood,
            'zipCode' => $this->zipCode,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
        ];
    }
}