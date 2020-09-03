
<!DOCTYPE html>
<html lang="fr">
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<p>
    <?php
        switch( $error ) {
            case 'not connected':
                echo 'Veuillez svp vous authentifier';
                break;
            case 'bad login/pwd':
                echo 'Erreur de login et/ou de mot de passe';
                break;
        }

    if( isset($login) && $login != ' ') {
        echo "<h1><a href='http://localhost/Annonces/index.php'>Site d'Annonces</a></h1>";
        echo 'Connecté en tant que '.$login.' ' ;
        echo '<a href="/Annonces/index.php/favoris">Favoris</a> ';
        echo '<a href="/Annonces/index.php/logout">Déconnexion</a> ';
    }
    if($login == "aphaz"){
        echo '<a href="/Annonces/index.php/admin">Administration</a>';
    }
    ?>
</p>
<?php echo $content; ?>

</body>
</html>