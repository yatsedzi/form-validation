<?php

include_once('functions.php');

$id = $_GET['id'] ?? '';
$isNormId = preg_match('/^[1-9][0-9]*$/' , $id);
$articles = getArticles();
$post = $articles[$id] ?? null;
$err = '';

if (!$isNormId || $post === null) {
    exit ('Error: article does not exist');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title === '' || $content === '') {
        $err = 'Заполните все поля!';
    } else if (mb_strlen($title, 'UTF8') < 2) {
        $err = 'Title не короче 2 символов!';
    } else {
        editArticle($id, $title, $content);
        header('Location:index.php');
        exit();
    }
} else {
    $title = $post['title'];
    $content = $post['content'];
}

?>
<div class="form">
    <p>Your app is done!</p>
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
