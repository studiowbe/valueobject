<?php


namespace Studiow\ValueObject\Scalar;


class NativeBool
{
    private $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function getValue(): bool
    {
        return $this->value;
    }

    public function equals(NativeBool $bool): bool
    {
        return $this->getValue() === $bool->getValue();
    }

}