<?php $title= 'Nouvelle Annonce'; ?>
<?php ob_start(); ?>
<form method="post" action="newpost">
    <label for="postTitle"> Titre du post </label> :
    <input type="text" name="postTitle" id="postTitle"/>
    <br/>
    <label for="postContent"> Contenu du Post </label> :
    <br/>
    <textarea name="postContent" id="postContent"></textarea>
    <br />
    <input type="submit" value="Envoyer"/>
</form>
<a href="annonces"> Annuler </a>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
