<?php


namespace Studiow\ValueObject\Web;


use Studiow\ValueObject\Scalar\NativeString;
use InvalidArgumentException;

class EmailAddress extends NativeString
{
    public function __construct(string $value)
    {
        $value = strtolower(trim($value));

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf("Invalid e-mail address: %s", $value));
        }
        parent::__construct($value);
    }
}