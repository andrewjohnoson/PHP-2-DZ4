<?php

namespace App\Controllers;

use App\AdminController;

class AdminPanel extends AdminController
{
    public function handle()
    {
        $this->view->articles = \App\Models\Article::findAll();
        $this->view->cols = \App\Models\Article::getColumns();
        $this->view->display(__DIR__ . '/../../templates/admin/index.php');
    }
}