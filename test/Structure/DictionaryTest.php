<?php


namespace Studiow\ValueObject\Test\Structure;


use PHPUnit\Framework\TestCase;
use Studiow\ValueObject\Structure\Dictionary;

class DictionaryTest extends TestCase
{
    public function testCreateObject()
    {
        $obj = new Dictionary(['foo' => 'bar']);
        $this->assertEquals(['foo' => 'bar'], $obj->getValue());
    }

    public function testInspectObject()
    {
        $obj = new Dictionary(['foo' => 'bar']);
        $this->assertTrue($obj->has('foo'));
        $this->assertFalse($obj->has('bar'));

        $this->assertEquals('bar', $obj->get('foo'));
        $this->assertNull($obj->get('bar'));
        $this->assertEquals('default', $obj->get('bar', 'default'));

        $this->assertEquals(1, sizeof($obj));
    }

    public function testObjectIsImmutable()
    {
        $original = new Dictionary(['foo' => 'bar']);
        $modified = $original->set('foo', 'bar2');
        $cleared = $original->remove('foo');

        $this->assertEquals(['foo' => 'bar'], $original->getValue());
        $this->assertEquals(['foo' => 'bar2'], $modified->getValue());
        $this->assertEquals([], $cleared->getValue());
    }
}