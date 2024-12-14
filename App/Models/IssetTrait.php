<?php

namespace App\Models;

trait IssetTrait
{
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}