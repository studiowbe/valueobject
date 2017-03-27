<?php


namespace Studiow\ValueObject\Test\Web;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Studiow\ValueObject\Web\UrlSlug;

class UrlSlugTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new UrlSlug("foo-123");
        $this->assertEquals("foo-123", $obj->getValue());
    }

    public function testCreateObjectFromString()
    {
        $obj = UrlSlug::fromString('Foo Bar 123 ');
        $this->assertEquals("foo-bar-123", $obj->getValue());
    }

    public function testValidateInput()
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new UrlSlug("Foo 123");
    }
}