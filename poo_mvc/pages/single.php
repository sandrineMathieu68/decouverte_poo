<?php 

$post = $db->prepare('SELECT * FROM films WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);//  à 32 mn
var_dump($post);
?>

<h1><?php echo $post->titre ?></h1>

<p><?php echo $post->description; ?></p>