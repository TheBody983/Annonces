<?php $title= 'Connexion'; ?>
<?php ob_start(); ?>
<div>
    <form method="post" action="annonces" class="containerColumn">
        <p><label for="login"> Identifiant </label> :</p>
        <input type="text" name="login" id="login" maxlength="12" required class="loginInput"/>
        <br />
        <p><label for="password"> Mot de Passe </label> :</p>
        <input type="password" name="password" id="password" maxlength="12" required class="loginInput"/>
        <br/>
        <input type="submit" value="Envoyer">
        <p>Pas de compte ? </p>
        <a href="register">Creer un compte</a>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>