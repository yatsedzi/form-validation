<?php

include_once('functions.php');

$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title === '' || $content === '') {
        $err = 'Заполните все поля!';
    } else if (mb_strlen($title, 'UTF8') < 2) {
        $err = 'Title не короче 2 символов!';
    } else {
        addArticle($title, $content);
        header('Location:index.php');
        exit();
    }
} else {
    $title = '';
    $content = '';
}

?>
<div class="form">
    <p>Your article is added!</p>
    <form method="post">
        Title:<br>
        <input type="text" name="title" value="<?= $title ?>"><br>
        Content:<br>
        <textarea name="content"><?= $content ?></textarea><br>
        <button>Send</button>
    </form>
</div>


<hr>
<a href="index.php">Move to main page</a>