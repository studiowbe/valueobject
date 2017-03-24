<?php


namespace Studiow\ValueObject\Scalar;


class NativeString
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
}