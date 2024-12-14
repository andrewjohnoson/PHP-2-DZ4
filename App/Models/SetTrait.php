<?php

namespace App\Models;

trait SetTrait
{
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}