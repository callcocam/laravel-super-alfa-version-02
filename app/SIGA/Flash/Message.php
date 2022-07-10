<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Flash;


class Message implements \ArrayAccess
{

    public $title;

    public $message;

    public $level = 'info';

    public $important = false;

    public $overlay = false;

    public function __construct($attributes = [])
    {
        $this->update($attributes);
    }

    public function update($attributes = [])
    {
        $attributes = array_filter($attributes);

        foreach ($attributes as $key => $attribute) {
                 $this->{$key} = $attribute;
        }

        return $this;
    }

    public function offsetExists($offset)
    {
        return isset($this->{$offset});
    }

    public function offsetGet($offset)
    {
        return $this->{$offset};
    }

    public function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}
