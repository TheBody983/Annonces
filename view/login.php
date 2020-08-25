<?php $title= 'Connexion'; ?>
<?php ob_start(); ?>
    <form method="post" action="annonces.php">
        <label for="login"> Identifiant </label> :
        <input type="text" name="login" id="login" placeholder="defaut" maxlength="12" required />
        <br />
        <label for="password"> Mot de Passe </label> :
        <input type="password" name="password" id="password" maxlength="12" required />
        <input type="submit" value="Envoyer">
    </form>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>