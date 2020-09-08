
<!DOCTYPE html>
<html lang="fr">
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="../stylesheet.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
<header class="sticky containerRow">
    <?php

    echo "<h1><a href='http://localhost/Annonces/index.php' class='titre'>Site d'Annonces</a></h1>";
    if( isset($login) && $login != ' ') {
        echo '<div class="containerColumn inHeader"><p>Connecté en tant que '.$login.'</p> ' ;
        echo '<div>' ;
        echo '<button><a href="/Annonces/index.php/favoris">Favoris</a></button> ';
        echo '<button><a href="/Annonces/index.php/logout">Déconnexion</a></button> ';
    }
    if($login == "aphaz"){
        echo '<button><a href="/Annonces/index.php/admin">Administration</a></button>';
    }
    echo '</div></div>' ;

    switch( $error ) {
            case 'not connected':
                echo "<p class='inHeader'>Vous n'êtes pas connecté. Veuillez vous connecter ou vous créer un compte.</p>";
                break;
            case 'bad login/pwd':
                echo "<p class='inHeader'''>Erreur d'authentification. Veuillez vous connecter ou vous créer un compte.</p>";
                break;
        }
    ?>
</header>
<?php echo $content; ?>

</body>
</html>