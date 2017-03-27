<?php


namespace Studiow\ValueObject\Test\Web;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Studiow\ValueObject\Web\EmailAddress;

class EmailAddressTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new EmailAddress("test@example.com");
        $this->assertEquals("test@example.com", $obj->getValue());
    }
    
    public function testNormalizeInput()
    {
        $obj = new EmailAddress("TEST@example.com");
        $this->assertEquals("test@example.com", $obj->getValue());
    }

    public function testValidateInput()
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new EmailAddress("test-example.com");
    }
}