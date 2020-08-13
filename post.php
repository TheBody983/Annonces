<?php
$link = mysqli_connect('localhost', 'root', '', 'jobstage_db');
$resultPost = mysqli_query($link, "SELECT postTitle, postContent FROM posts WHERE postID = '".$_GET['postID']."'" );
mysqli_close($link);

$post =  mysqli_fetch_assoc($resultPost)
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?php echo $post['postTitle']; ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>

<body>
<h1><?php echo $post['postTitle']; ?></h1>
<p> <?php echo $post['postContent'];?> </p>
</body>
</html>
