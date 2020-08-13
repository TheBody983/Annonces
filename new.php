<?php
$link = mysqli_connect('localhost', 'root', '', 'jobstage_db');
$resultPost = mysqli_query($link, "SELECT MAX(postID) as postID FROM posts");
mysqli_close($link);

$postID =  mysqli_fetch_assoc($resultPost)["postID"]+1;
?>

<html lang="fr">
<head>
    <title>Nouveau Post</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<form method="post" action="annonces.php">
    <label for="postTitle"> Titre du post </label> :
    <input type="text" name="postTitle" id="postTitle"/>
    <br/>
    <label for="postID">Post n°</label> :
    <input type="text" name="postID" id="postID" value=<?php echo '"'.$postID.'"'?> readonly/>
    <br />
    <label for="postContent"> Contenu du Post </label> :
    <br/>
    <textarea name="postContent" id="postContent"></textarea>
    <br />
    <input type="submit" value="Envoyer"/>
</form>
<a href="annonces.php"> Annuler </a>
</body>
</html>