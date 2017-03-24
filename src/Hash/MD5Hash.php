<?php


namespace Studiow\ValueObject\Hash;


use Studiow\ValueObject\Scalar\NativeString;
use InvalidArgumentException;

class MD5Hash extends NativeString
{
    public static function fromString(string $input): MD5Hash
    {
        return new self(md5($input));
    }

    public function __construct(string $hash)
    {
        $hash = strtolower($hash);
        $pattern = "#^[a-f0-9]{32}$#";
        if (!preg_match($pattern, $hash)) {
            throw new InvalidArgumentException(sprintf("Invalid MD5 hash: %s", $hash));
        }

        parent::__construct($hash);
    }
}