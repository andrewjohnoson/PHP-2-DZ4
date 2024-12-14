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
    <title>Новости (адимин)</title>
</head>
<body>
    <h1>Новости</h1>
    <?php
        foreach ($this->articles as $article) { ?>
            <article>
                <h2><?php echo $article->title;?></h2>
                <p><?php echo $article->content; ?></p>
                <p><?php echo $article->author; ?></p>
                <p><em><?php echo $article->id; ?></em></p>
            </article>
            <hr>
    <?php } ?>

    <h1>Админ-панель</h1>
    <form action="actions/save.php" enctype="multipart/form-data" method="post">
        <p>ID новости: </p>
        <input type="text" name="id" placeholder="Введите ID новости">
        <?php
            foreach ($this->cols as $col) {
                if ('id' === $col || 'author_id' === $col) {
                    continue;
                }
                ?>
        <p>Изменить <?php echo $col ?></p>
        <input type="text" name="<?php echo $col?>" placeholder="<?php echo 'Поменять ' . $col; ?>">
        <?php } ?>
        <br>
        <input type="submit" value="Отпрвить">
    </form>
</body>
</html>