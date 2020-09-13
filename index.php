<?php
//Code Source : https://github.com/TheBody983/Annonces

// charge et initialise les bibliothèques globales
require_once 'model.php';
require_once 'controllers.php';

//Démarrage de la session
session_start();

//RECUPERE L'URL ET LE COUPE EN MORCEAUX AU NIVEAU DE '/'
$action = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//PREND LE DERNIER MORCEAU DE $URI SOIT LE PARAMETRE
$action = end($action);
//echo $uri;

//RECUPERE LA SOURCE
if(isset($_SERVER['HTTP_REFERER'])){
    $source  = explode('/',parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH));
    $source = end($source);
}

//Enregistrement avant la vérification d'authentification
if('register' == $action){
    $login = ' ';
    $error = ' ';
    register_action($login, $error);
    exit;
}

//Création d'un nouvel utilisateur si vient de register
if(isset($source)) {
    if ($source == "register") {
        if (isset($_POST['city'])) {
            new_user($_POST['login'], $_POST['password'], $_POST['surname'], $_POST['name'], $_POST['mail'], $_POST['country'], $_POST['city']);
        } else {
            new_user($_POST['login'], $_POST['password'], $_POST['surname'], $_POST['name'], $_POST['mail'], ' ', ' ');
        }
    }
}

// vérification utilisateur authentifié
if(!isset($_SESSION['login']) ) {
    if( !isset($_POST['login']) || !isset($_POST['password']) ) {
        $error='not connected';
        $action = 'login';
    }
    elseif( !hashed_is_user($_POST['login'],$_POST['password']) ){
        $error='bad login/pwd';
        $action = 'login';
    }
    else {
        $_SESSION['userID'] = getUserID($_POST['login']);
        $_SESSION['login'] = getUserLogin($_SESSION['userID']);
        $login = $_SESSION['login'];
    }
}
else{
    $login = $_SESSION['login'] ;
}


//Pour éviter les erreurs de $login not set en param
if(!isset($login)){
    //Corriger l'adresse pour éviter les bugs de type "/Annonce/annonces"
    if(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/Annonces/index.php')
    {
        header("refresh:0;url=http://localhost/Annonces/index.php/login");
    }
    $login = ' ';
}
if(!isset($error)){
    $error = ' ';
}

switch ( $action ) {

    case 'login' :                  //Connecter si pas de session
        login_action($login, $error);
        break;

    case 'index.php':               //Rediriger vers annonces si index.php et Session
        homepage();
        break;

    case 'annonces' :               //Afficher les annonces
        if(isset($_POST['postTitle'])) prepared_new_post($_POST['postTitle'], $_POST['postContent'], $_SESSION['userID']);
        annonces_action($login, $error);
        break;

    case 'post' :                   //Consulter un post dont l'id est placé en get
        if(isset($_GET['id'])) {
            post_action($_GET['id'], $login, $error);
        }
        else $error = 'noresult';
        break;

    case 'offre' :                  //Consulter une offre dont l'id est placé en get
        if(isset($_GET['id'])) {
            offre_action($_GET['id'], $login, $error);
        }
        else $error = 'noresult';
        break;

    case 'logout' :                //Se déconnecter
        logout();
        break;

    case 'new' :                    //Créer une nouvelle annonce
        new_action($login, $error);
        break;

    case 'favoris' :               //Accèder aux offres signalées
        favoris_action($login, $error);
        break;

    case 'admin':                   //Administration des posts et utilisateurs
        if (isset($_GET['deleteUser'])) {
            delete_user($_GET['deleteUser']);
        }
        if (isset($_GET['deletePost'])) {
           delete_post($_GET['deletePost']);
        }
        admin_action($login, $error);
        break;

    default :
        header('Status: 404 Not Found');
        echo '<html><body><h1>My Page Not Found</h1></body></html>';

}
?>