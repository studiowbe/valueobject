<?php


namespace Studiow\ValueObject\Test\Numeric;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Studiow\ValueObject\Numeric\NaturalNumber;


class NaturalNumberTest extends TestCase
{
    public function testValidateInput()
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new NaturalNumber(-1);

        $this->expectException(InvalidArgumentException::class);
        $obj = new NaturalNumber(-1.4);
    }

}