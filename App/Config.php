<?php

namespace App;

class Config
{
    protected static $instance;
    public $data;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/configTemplate.php';
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

}