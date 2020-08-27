<?php
include "dataAPI.php"
?>

<html lang="fr">
<head>
    <title>Créer un compte</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<form method="post" action="index.php/annonces">
    <label for="name"> Nom </label> :
    <input type="text" name="name" id="name"/>
    <br />
    <label for="surname"> Prenom </label> :
    <input type="text" name="surname" id="surname"/>
    <br />
    <label for="mail"> Mail </label> :
    <input type="text" name="mail" id="mail"/>
    <br />
    <label for="country">Pays d'origine</label>
    <select name="country" id="country">
        <?php
        $pays = pays('');
        foreach( $pays as $complet => $nom ){
            echo '<option value = "'.$nom.'">'.$complet.'</option>';
        }
        ?>
    </select>

    <br />

    <label for="citySelect">Ville de Résidence</label>
    <select name="city" id="citySelect">
        <?php
        $villesNC = cityNC('');
        foreach( $villesNC as $nom => $cp ){
            echo '<option value = "'.$nom.'">'.$cp.' - '.$nom.'</option>';
        }
        ?>
    </select>

    <br />
    <label for="idlogin"> Votre identifiant </label> :
    <input type="text" name="login" id="idlogin"/>
    <br />
    <label for="idpassword"> Votre mot de passe </label> :
    <input type="password" name="password" id="idpassword" />
    <br />
    <input type="submit" value="Envoyer"/>
</form>
<a href="index.php"> Annuler </a>
</body>
</html>