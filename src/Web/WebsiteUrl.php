<?php


namespace Studiow\ValueObject\Web;

use InvalidArgumentException;
use Studiow\ValueObject\Scalar\NativeString;

class WebsiteUrl extends NativeString
{
    public function __construct(string $url)
    {
        $url = trim($url);
        if (!$this->isValidWebsiteUrl($url)) {
            throw new InvalidArgumentException(sprintf("Invalid website url: %s", $url));
        }
        parent::__construct($url);
    }


    private function isValidWebsiteUrl($url): bool
    {
        if (strtolower(substr($url, 0, 4)) != 'http') {
            return false;
        }

        if (false === filter_var($url, FILTER_VALIDATE_URL, [FILTER_FLAG_SCHEME_REQUIRED])) {
            return false;
        }

        return true;
    }
}