<?php
//Code Source : https://github.com/TheBody983/Annonces

// charge et initialise les bibliothèques globales
require_once 'model.php';
require_once 'controllers.php';

//Démarrage de la session
session_start();

//RECUPERE L'URL ET LE COUPE EN MORCEAUX AU NIVEAU DE '/'
$uri = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//PREND LE DERNIER MORCEAU DE $URI SOIT LE PARAMETRE
$uri = end($uri);
//echo $uri;

//Enregistrement avant la vérification d'authentification
if('register' == $uri){
    $login = ' ';
    $error = ' ';
    register_action($login, $error);
    exit;
}

//Création d'un nouvel utilisateur si vient de register
if(isset($_POST['mail'])){
    if(isset($_POST['city'])) {
        new_user($_POST['login'], $_POST['password'], $_POST['surname'], $_POST['name'], $_POST['mail'], $_POST['country'], $_POST['city']);
    }
    else{
        new_user($_POST['login'], $_POST['password'], $_POST['surname'], $_POST['name'], $_POST['mail'], ' ', ' ');
    }
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
else{
    $login = $_SESSION['login'] ;
}

//Pour éviter les erreurs de $login not set en param
if(!isset($login)){
    $login = ' ';
}
if(!isset($error)){
    $error = ' ';
}

//Connecter si pas de session
if ($uri == 'login'){
    //Corriger l'adresse pour éviter les bugs de type "/Annonce/annonces"
    if(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/Annonces/index.php')
    {
        header("refresh:0;url=http://localhost/Annonces/index.php/login");
    }
    login_action($login,$error);
}

//Rediriger vers annonces si index.php et Session
elseif($uri == 'index.php'){
    homepage();
}

//Afficher les annonces
else if ( $uri == 'annonces'  || 'newpost' == $uri ){
    //Creation d'une nouvelle annonce si en provenance de new
    if(isset($_POST['postTitle']) ){
        new_post($_POST['postTitle'],$_POST['postContent'], $login);
    }
    annonces_action($login,$error);
}

//Consulter un post dont l'id est placé en get
elseif ('post' == $uri && isset($_GET['id'])) {
    post_action($_GET['id'],$login,$error);
}

//Consulter une offre dont l'id est placé en get
elseif ('offre' == $uri && isset($_GET['id'])) {
    offre_action($_GET['id'],$login,$error);
}

//Se déconnecter
elseif('logout' == $uri ) {
    // fermeture de la session
    logout();
}

//Créer une nouvelle annonce
elseif ('new' == $uri){
    new_action($login, $error);
}

//Accèder aux offres signalées
elseif ('favoris' == $uri){
    favoris_action($login, $error);
}

//Administration des posts et utilisateurs
elseif ('admin' == $uri && $login == "aphaz"){
    if(isset($_GET['deleteUser'])){
        delete_user($_GET['deleteUser']);
    }
    if(isset($_GET['deletePost'])){
        delete_post($_GET['deletePost']);
    }
    admin_action($login, $error);
}

//Si rien n'est trouvé
else {
header('Status: 404 Not Found');
echo '<html><body><h1>My Page Not Found</h1></body></html>';
}

?>