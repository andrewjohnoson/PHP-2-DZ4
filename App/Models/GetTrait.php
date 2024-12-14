<?php

namespace App\Models;

trait GetTrait
{
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }
}