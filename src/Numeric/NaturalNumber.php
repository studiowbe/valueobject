<?php


namespace Studiow\ValueObject\Numeric;


use Studiow\ValueObject\Scalar\NativeInteger;
use InvalidArgumentException;

class NaturalNumber extends NativeInteger
{
    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new InvalidArgumentException("Number must be zero or bigger");
        }

        parent::__construct($value);
    }
}