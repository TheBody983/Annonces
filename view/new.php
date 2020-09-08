<?php $title= 'Nouvelle Annonce'; ?>
<?php ob_start(); ?>
<form method="post" action="annonces" class="containerColumn">
    <div></p><label for="postTitle"> Titre du post </label> :</div>
    <br/>
    <input type="text" name="postTitle" id="postTitle"/>
    <br/>
    <div><label for="postContent"> Contenu du Post </label> :</div>
    <br/>
    <textarea name="postContent" id="postContent"></textarea>
    <br />
    <input type="submit" value="Envoyer"/>
    <a href="annonces"> Annuler </a>
</form>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
