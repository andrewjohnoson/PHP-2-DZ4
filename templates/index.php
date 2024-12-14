<?php
/**
 * @var \App\View $this
 * @var \App\Models\Article $article
 */
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Новости</h1>
    <?php
        foreach ($this->articles as $article) { ?>
            <article>
                <h2>
                    <a href="/?ctrl=article&id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a></h2>
                <p><?php echo $article->content; ?></p>
                <p><?php echo $article->author?></p>
            </article>

            <hr>
        <?php } ?>
</body>
</html>