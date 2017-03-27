<?php


namespace Studiow\ValueObject\Test\Scalar;


use PHPUnit\Framework\TestCase;
use Studiow\ValueObject\Scalar\NativeInteger;

class NativeIntegerTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new NativeInteger(111);
        $this->assertEquals(111, $obj->getValue());
    }

    public function testCompareObject()
    {
        $obj = new NativeInteger(111);
        $same = new NativeInteger(111);
        $diff = new NativeInteger(211);
        $this->assertTrue($obj->equals($same));
        $this->assertFalse($obj->equals($diff));
    }
}