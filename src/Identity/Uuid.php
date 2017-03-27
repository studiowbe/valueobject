<?php


namespace Studiow\ValueObject\Identity;


use Studiow\ValueObject\Scalar\NativeString;
use Ramsey\Uuid\Uuid as RamseyUuid;
use InvalidArgumentException;

class Uuid extends NativeString
{
    /**
     * Uuid constructor. Pass null to create a new, random ID
     * @param string|null $value
     */
    public function __construct(string $value = null)
    {
        if (is_null($value)) {
            $value = RamseyUuid::uuid4()->toString();
        }

        $pattern = '#^[0-9a-f]{8}-([0-9a-f]{4}-){3}[0-9a-f]{12}$#';
        if (!preg_match($pattern, $value)) {
            throw new InvalidArgumentException(sprintf("Invalid UUID: %s", $value));
        }

        parent::__construct($value);
    }
}