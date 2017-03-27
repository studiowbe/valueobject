<?php


namespace Studiow\ValueObject\Test\Identity;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Studiow\ValueObject\Identity\Uuid;

class UuidTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new Uuid("85f58ca0-78cc-4c38-9961-03ec7cbea035");
        $this->assertEquals("85f58ca0-78cc-4c38-9961-03ec7cbea035", $obj->getValue());
    }

    public function testValidateInput()
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new Uuid("85f58ca0");
    }
}