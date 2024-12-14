<?php

require __DIR__ . '/../App/autoload.php';

$data = $_POST;
if (is_numeric($data['id']) && !empty($data['id'])) {
    $article = \App\Models\Article::findById($data['id']);
} else {
    header ('Location: https://php2.local/');
}

if ($article->id !== null) {
    foreach ($data as $key => $value) {
        if (!empty($value)) {
            $article->$key = $value;
        }
    }
} else {
    header ('Location: https://php2.local/?ctrl=adminpanel');
}

$article->update();
header ('Location: https://php2.local/?ctrl=adminpanel');