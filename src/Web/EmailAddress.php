<?php


namespace Studiow\ValueObject\Web;


use Studiow\ValueObject\Scalar\NativeString;
use InvalidArgumentException;

class EmailAddress extends NativeString
{
    public function __construct(string $address)
    {
        $address = strtolower(trim($address));

        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf("Invalid e-mail address: %s", $address));
        }
        parent::__construct($address);
    }
}