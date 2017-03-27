<?php


namespace Studiow\ValueObject\Test\Hash;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Studiow\ValueObject\Hash\MD5Hash;

class MD5HashTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new MD5Hash("acbd18db4cc2f85cedef654fccc4a4d8");
        $this->assertEquals("acbd18db4cc2f85cedef654fccc4a4d8", $obj->getValue());
    }

    public function testCreateObjectFromString()
    {
        $obj = MD5Hash::fromString('foo');
        $this->assertEquals("acbd18db4cc2f85cedef654fccc4a4d8", $obj->getValue());
    }

    public function testValidateInput()
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new MD5Hash("acbd18");
    }
}