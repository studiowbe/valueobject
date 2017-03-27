<?php


namespace Studiow\ValueObject\Test\Hash;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Studiow\ValueObject\Hash\BcryptHash;

class BcryptHashTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new BcryptHash('$2y$10$rdP0AFZauq1bpXrGdDgon.NjJe0wV3zqIKB4JbNpu6SNkd7PGkEAC');
        $this->assertEquals('$2y$10$rdP0AFZauq1bpXrGdDgon.NjJe0wV3zqIKB4JbNpu6SNkd7PGkEAC', $obj->getValue());
    }

    public function testCreateObjectFromString()
    {
        $obj = BcryptHash::fromString('foo');

        $this->assertTrue(password_verify('foo', $obj->getValue()));
    }

    public function testValidateInput()
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new BcryptHash('$2y$10$rdP0AFZauq');
    }
}