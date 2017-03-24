<?php


namespace Studiow\ValueObject\Hash;


use Studiow\ValueObject\Scalar\NativeString;
use InvalidArgumentException;

class BcryptHash extends NativeString
{
    public static function fromString(string $input): BcryptHash
    {
        return new self(password_hash($input, PASSWORD_BCRYPT));
    }

    public function __construct(string $hash)
    {
        $info = password_get_info($hash);
        if ($info['algoName'] != 'bcrypt') {
            throw new InvalidArgumentException(sprintf("Invalid bcrypt hash: %s", $hash));
        }
        parent::__construct($hash);
    }
}