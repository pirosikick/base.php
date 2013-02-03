<?php
namespace Base;

class Number
{
    protected $_number;

    final public function __construct($number)
    {
        $this->_number = $number;
        return $this;
    }

    public function equals()
    {
        return $this->_number;
    }

    public function plus($number)
    {
        return new static($this->_number + $number);
    }

    public function minus($number)
    {
        return new static($this->_number - $number);
    }

    public function divided_by($number)
    {
        return new static($this->_number / $number);
    }

    public function times($number)
    {
        return new static($this->_number * $number);
    }
}

