<?php


namespace Studiow\ValueObject\Test\Scalar;


use PHPUnit\Framework\TestCase;
use Studiow\ValueObject\Scalar\NativeString;

class NativeStringTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new NativeString("foo");
        $this->assertEquals("foo", $obj->getValue());
    }

    public function testCompareObject()
    {
        $obj = new NativeString("foo");
        $same = new NativeString("foo");
        $diff = new NativeString("bar");
        $this->assertTrue($obj->equals($same));
        $this->assertFalse($obj->equals($diff));
    }
}