<?php

include_once('functions.php');
$id = $_GET['id'] ?? '';
$isNormId = preg_match('^[1-9][0-9]*$^', $id);
$res = $isNormId && removeArticle($id);
?>
<?= $res ? 'All done!' : 'Not found'?>
<hr>
<a href="index.php">Move to main page</a>