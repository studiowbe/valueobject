<?php


namespace Studiow\ValueObject\Web;


use Studiow\ValueObject\Scalar\NativeString;
use InvalidArgumentException;

class UrlSlug extends NativeString
{
    public function __construct(string $value)
    {
        $pattern = "#^[a-z0-9-]+$#";
        if (!preg_match($pattern, $value)) {
            throw new InvalidArgumentException(sprintf("Invalid url slug: %s", $value));
        }
        parent::__construct($value);
    }
}