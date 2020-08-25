<?php
$link = mysqli_connect('localhost', 'root', '', 'jobstage_db');
$result = mysqli_query($link, 'SELECT * FROM posts WHERE postId='.$_GET['id'] );
$post = mysqli_fetch_assoc($result);
mysqli_close($link);
// inclut le code de la présentation HTML
require 'view/post.php';
?>