<?php


namespace Studiow\ValueObject\Structure;

use Countable;
use IteratorAggregate;
use ArrayIterator;
use JsonSerializable;

class Dictionary implements Countable, IteratorAggregate, JsonSerializable
{
    private $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    public function get(string $key, $default = null)
    {
        return $this->has($key) ? $this->data[$key] : $default;
    }

    public function set($key, $value = null): Dictionary
    {
        if (!is_array($key)) {
            $key = [$key => $value];
        }

        return new self(array_merge($this->data, $key));
    }

    public function remove($key): Dictionary
    {
        return new self(array_diff_key($this->data, array_flip((array)$key)));
    }

    public function getValue(): array
    {
        return $this->data;
    }

    public function count(): int
    {
        return sizeof($this->data);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }

    public function jsonSerialize()
    {
        return $this->getValue();
    }
}