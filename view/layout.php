
<!DOCTYPE html>
<html lang="fr">
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="https://dailycssdesign.com/dist/styles.min.css">
</head>
<body>
<p>
    <?php

    echo "<header><h1><a href='http://localhost/Annonces/index.php'>Site d'Annonces</a></h1></header>";
    if( isset($login) && $login != ' ') {
        echo '<p>Connecté en tant que '.$login.'</p> ' ;
        echo '<a href="/Annonces/index.php/favoris">Favoris</a> ';
        echo '<a href="/Annonces/index.php/logout">Déconnexion</a> ';
    }
    if($login == "aphaz"){
        echo '<a href="/Annonces/index.php/admin">Administration</a>';
    }

    switch( $error ) {
            case 'not connected':
                echo "<p>Vous n'êtes pas connecté.</p>";
                break;
            case 'bad login/pwd':
                echo "<p>Erreur d'authentification. Veuillez vous connecter ou vous créer un compte.</p>";
                break;
            case 'noresult':
                echo '<p>Aucun Résultat</p>';
                break;
        }
    ?>
</p>
<?php echo $content; ?>

</body>
</html>