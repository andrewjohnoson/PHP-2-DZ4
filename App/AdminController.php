<?php

namespace App;

use \App\View;

abstract class AdminController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access() : bool
    {
        return (isset($_SESSION['login']) &&
            $_SESSION['login'] === 'admin') ? true : false;
    }

    public function __invoke()
    {
        if ($this->access()) {
            $this->handle();
        } else {
            die ('Доступ закрыт');
        }
    }

    abstract public function handle();
}