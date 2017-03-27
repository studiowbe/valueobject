<?php


namespace Studiow\ValueObject\Test\Scalar;


use PHPUnit\Framework\TestCase;
use Studiow\ValueObject\Scalar\NativeBool;


class NativeBoolTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new NativeBool(true);
        $this->assertEquals(true, $obj->getValue());
    }

    public function testCompareObject()
    {
        $obj = new NativeBool(true);
        $same = new NativeBool(true);
        $diff = new NativeBool(false);
        $this->assertTrue($obj->equals($same));
        $this->assertFalse($obj->equals($diff));
    }
}