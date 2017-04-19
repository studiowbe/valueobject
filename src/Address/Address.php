<?php


namespace Studiow\ValueObject\Address;

use JsonSerializable;
use Studiow\ValueObject\Scalar\NativeString;

class Address implements JsonSerializable
{

    private $street;
    private $zip;
    private $city;
    private $state;
    private $country;

    public function __construct(
        NativeString $street,
        NativeString $zip,
        NativeString $city,
        NativeString $state,
        Country $country
    )
    {

        $this->street = $street;
        $this->zip = $zip;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function getStreet(): NativeString
    {
        return $this->street;
    }

    public function getZip(): NativeString
    {
        return $this->zip;
    }

    public function getCity(): NativeString
    {
        return $this->city;
    }

    public function getState(): NativeString
    {
        return $this->state;
    }

    public function getCountry(): Country
    {
        return $this->country;
    }


    public function withStreet(NativeString $street): Address
    {
        return new self(
            $street,
            $this->getZip(),
            $this->getCity(),
            $this->getState(),
            $this->getCountry()
        );
    }

    public function withZip(NativeString $zip): Address
    {
        return new self(
            $this->getStreet(),
            $zip,
            $this->getCity(),
            $this->getState(),
            $this->getCountry()
        );
    }

    public function withCity(NativeString $city): Address
    {
        return new self(
            $this->getStreet(),
            $this->getZip(),
            $city,
            $this->getState(),
            $this->getCountry()
        );
    }

    public function withState(NativeString $state): Address
    {
        return new self(
            $this->getStreet(),
            $this->getZip(),
            $this->getCity(),
            $state,
            $this->getCountry()
        );
    }

    public function withCountry(Country $country): Address
    {
        return new self(
            $this->getStreet(),
            $this->getZip(),
            $this->getCity(),
            $this->getState(),
            $country
        );
    }


    public function equals(Address $address): bool
    {
        return
            $this->getStreet()->equals($address->getStreet()) &&
            $this->getZip()->equals($address->getZip()) &&
            $this->getCity()->equals($address->getCity()) &&
            $this->getState()->equals($address->getState()) &&
            $this->getCountry()->equals($address->getCountry());
    }


    public function jsonSerialize()
    {
        return [
            'street' => $this->getStreet(),
            'zip' => $this->getZip(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'country' => $this->getCountry()
        ];
    }
}