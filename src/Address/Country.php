<?php


namespace Studiow\ValueObject\Address;


use Studiow\ValueObject\Scalar\NativeString;

class Country extends NativeString
{

    private $name;

    public function __construct(string $code)
    {
        $code = strtoupper(trim($code));
        $this->name = CountryCode::getName($code);
        parent::__construct($code);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return parent::getValue();
    }

}