<?php


namespace Studiow\ValueObject\Scalar;


class NativeFloat
{
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }


    public function getValue(): float
    {
        return $this->value;
    }

    public function equals(NativeFloat $float): bool
    {
        return $this->getValue() === $float->getValue();
    }
}