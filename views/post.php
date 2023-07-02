<?php 
$title = 'Bosh sahifa';
$id = $matches[1];
$statement = $pdo->prepare('SELECT * FROM Post where id = :id ');
$statement-> execute(['id' => $id]);

$post = $statement->fetch();
// var_dump($post);
?>

<div class="container mt-5">
    <h1><?= $post['title'] ?></h1>
    <p class="fs-5 col-md-8" ><?= $post['body'] ?></p>

</div>

