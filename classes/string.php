<?php
namespace Base;

class String
{
    private $_string;

    public function __construct($string)
    {
        $this->_string = (string)$string;
    }

    public function slice($start, $length = null)
    {
        $string = $length === null
            ? substr($this->_string, $start)
            : substr($this->_string, $start, $length);

        return new self($string);
    }

    public function match($regexp)
    {
        if (preg_match($regexp, $this->_string, $matches)) {
            return new self($matches[0]);
        }
        return null;
    }

    public function charAt($index)
    {
        if (is_int($index) && $index >= 0 && $index < strlen($this->_string)) {
            return $this->_string[$index];
        }
        return null;
    }

    public function indexOf($key, $offset = 0)
    {
        return strpos($this->_string, $key, $offset);
    }

    public function __toString()
    {
        return $this->_string;
    }

}
