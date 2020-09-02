<?php
// charge et initialise les bibliothèques globales
require_once 'model.php';
require_once 'controllers.php';

//Démarrage de la session
session_start();

// route la requête en interne
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//echo $uri;

if('/Annonces/index.php/register' == $uri){
    $login = ' ';
    $error = ' ';
    register_action($login, $error);
    exit;
}

if(isset($_POST['mail'])){
    new_user($_POST['login'],$_POST['password'],$_POST['surname'],$_POST['name'],$_POST['mail'],$_POST['country'],$_POST['city']);
}

// vérification utilisateur authentifié
if(!isset($_SESSION['login']) ) {
    if( !isset($_POST['login']) || !isset($_POST['password']) ) {
        $error='not connected';
        $uri = 'login';
    }
    elseif( !is_user($_POST['login'],$_POST['password']) ){
        $error='bad login/pwd';
        $uri = 'login';
    }
    else {
        $_SESSION['login'] = $_POST['login'] ;
        $login = $_SESSION['login'];
    }
}

else
    $login = $_SESSION['login'] ;

if(!isset($login)){
    $login = ' ';
}

if(!isset($error)){
    $error = ' ';
}

// route la requête en interne



if ($uri == 'login') {
    login_action($login,$error);
}

else if ('/Annonces/index.php' == $uri || '/Annonces/index.php/annonces' == $uri  || '/Annonces/index.php/newpost' == $uri ){
    if('/Annonces/index.php/newpost' == $uri && isset($_POST['postTitle']) ){
        new_post($_POST['postTitle'],$_POST['postContent']);
    }
    annonces_action($login,$error);
}

elseif ('/Annonces/index.php/post' == $uri && isset($_GET['id'])) {
    post_action($_GET['id'],$login,$error);
}

elseif('/Annonces/index.php/logout' == $uri ) {
    // fermeture de la session
    session_destroy();
    refresh();
}
elseif ('/Annonces/index.php/new' == $uri){
    new_action($login, $error);
}



else {
header('Status: 404 Not Found');
echo '<html><body><h1>My Page Not Found</h1></body></html>';
}

?>