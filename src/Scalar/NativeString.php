<?php


namespace Studiow\ValueObject\Scalar;

use JsonSerializable;

class NativeString implements JsonSerializable
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(NativeString $string): bool
    {
        return $this->getValue() === $string->getValue();
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    public function jsonSerialize()
    {
        return $this->getValue();
    }
}