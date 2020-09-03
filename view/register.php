<?php
include "dataAPI.php"
?>
<?php $title= 'Register'; ?>
<?php ob_start(); ?>
<form method="post" action="annonces">
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
<a href="http://localhost/Annonces/index.php"> Annuler </a>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
