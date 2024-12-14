<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{
    protected function handle()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}