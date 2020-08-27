<?php
// charge et initialise les bibliothèques globales
require_once 'model.php';
require_once 'controllers.php';

// route la requête en interne
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo $uri;
if(isset($_POST['mail'])){
    new_user($_POST['login'],$_POST['password'],$_POST['surname'],$_POST['name'],$_POST['mail'],$_POST['country'],$_POST['city']);
}
elseif ( '/developpement_web/Flouvat/Annonces/index.php/annonces' == $uri
    && isset($_POST['login']) && isset($_POST['password']) ){
    annonces_action($_POST['login'], $_POST['password']);
}
elseif ('/developpement_web/Flouvat/Annonces/index.php/post' == $uri
    && isset($_GET['id'])) {
    post_action($_GET['id']);
}

elseif ('/developpement_web/Flouvat/Annonces/index.php/new' == $uri
    && isset($_POST['login']) && isset($_POST['password']) ){
    new_action();
}

elseif ('/developpement_web/Flouvat/Annonces/index.php/register' == $uri){
    register_action();
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}
if ('/developpement_web/Flouvat/Annonces/' == $uri) {
    header( "refresh:0;url=index.php" );
}
if ('/developpement_web/Flouvat/Annonces/index.php' == $uri) {
    login_action();
}
?>