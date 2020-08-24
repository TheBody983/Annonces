<?php
$link = mysqli_connect('localhost', 'root', '', 'jobstage_db');
if(isset($_POST['mail'])){
    $query = 'SELECT login FROM Users WHERE login="' . $_POST['login'] . '"';
    $resultregister = mysqli_query($link, $query);
    if( mysqli_num_rows( $resultregister) ){
        mysqli_free_result($resultregister);
        header("refresh:5;url=index.html");
        echo 'Login existant (redirection automatique dans 5 sec.)';
        exit;
    }
    else {
        $query = 'INSERT INTO users VALUES ("' . $_POST['login'] . '", "' . $_POST['password'] . '", "' . $_POST['surname'] . '", "' . $_POST['name'] . '", "' . $_POST['mail'] . '", "' . $_POST['country'] . '", "' . $_POST['city'] . '")';
        $resultregister = mysqli_query($link, $query);
    }
}

if(isset($_POST['postID'])){
    $query= 'INSERT INTO posts VALUES ("'.$_POST['postID'].'", "'.$_POST['postTitle'].'", "'.$_POST['postContent'].'")' ;
    $insertresult = mysqli_query($link, $query );
}
if(isset($_POST['login'])) {
    $query = 'SELECT login FROM Users WHERE login="' . $_POST['login'] . '" and password="' . $_POST['password'] . '"';
    $resultlogin = mysqli_query($link, $query);
    if( mysqli_num_rows( $resultlogin) ){
        mysqli_free_result($resultlogin);
    }
    else {
        header("refresh:5;url=index.html");
        echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
        exit;
    }
}

$resultPosts = mysqli_query($link, "SELECT postID, postTitle FROM posts" );
mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Hello <?php echo $_POST['login']; ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<p> Hello <?php echo $_POST['login']; ?> </p>

<ul>
    <?php while ($row = mysqli_fetch_assoc($resultPosts)): ?>
        <li>
            <a href="post.php?postID=<?php echo $row['postID']; ?>">
            <?php echo $row['postTitle']; ?></a>
        </li>
    <?php endwhile ?>
</ul>

<a href="new.php"> Nouvelle Annonce </a>

</body>
</html>
