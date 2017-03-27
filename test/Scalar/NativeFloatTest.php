<?php


namespace Studiow\ValueObject\Test\Scalar;


use PHPUnit\Framework\TestCase;
use Studiow\ValueObject\Scalar\NativeFloat;

class NativeFloatTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new NativeFloat(1.11);
        $this->assertEquals(1.11, $obj->getValue());
    }

    public function testCompareObject()
    {
        $obj = new NativeFloat(1.11);
        $same = new NativeFloat(1.11);
        $diff = new NativeFloat(2.11);
        $this->assertTrue($obj->equals($same));
        $this->assertFalse($obj->equals($diff));
    }
}