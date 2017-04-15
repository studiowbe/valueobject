<?php


namespace Studiow\ValueObject\Scalar;

use JsonSerializable;

class NativeInteger implements JsonSerializable
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }


    public function getValue(): int
    {
        return $this->value;
    }

    public function equals(NativeInteger $integer): bool
    {
        return $this->getValue() === $integer->getValue();
    }

    public function jsonSerialize()
    {
        return $this->getValue();
    }
}