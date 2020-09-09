
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

    if(isset($_SESSION['userID'])) {
        if ($_SESSION['userID'] == 1) echo "<h1 class='containerRow'><a href='http://localhost/Annonces/index.php' class='titre1'>Annonces <item class='titre2'>hub </item></a></h1>";
        else echo "<h1 class='containerRow'><a href='http://localhost/Annonces/index.php' class='titre'>Site d'Annonces</a></h1>";
    }
    else echo "<h1 class='containerRow'><a href='http://localhost/Annonces/index.php' class='titre'>Site d'Annonces</a></h1>";

    if( isset($login) && $login != ' ') {
        echo '<div class="header Column inHeader"><p>Connecté en tant que '.$login.'</p> ' ;
        echo '<div>' ;
        echo '<button><a href="/Annonces/index.php/favoris">Favoris</a></button> ';
        echo '<button><a href="/Annonces/index.php/logout">Déconnexion</a></button> ';
    }
    if(isset($_SESSION['userID'])) if($_SESSION['userID'] == 1){
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
<button class="openbtn" onclick="openNav()">&#9776; See Users</button>

<?php echo $content; ?>

<div id="users" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <?php foreach( get_all_users() as $user ) : ?>
        <li><?php echo getUserLogin($user['userID']); ?></li>
    <?php endforeach ?>
</div>


</body>
<script>
    /* Set the width of the sidebar to 250px (show it) */
    function openNav() {
        document.getElementById("users").style.width = "250px";
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
        document.getElementById("users").style.width = "0";
    }
</script>
</html>