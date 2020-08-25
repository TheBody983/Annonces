<?php
// charge et initialise les bibliothèques globales
require_once 'model.php';
require_once 'controllers.php';
// route la requête en interne
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/Annonces/index.php' == $uri) {
    login_action();
}
elseif ( '/Annonces/index.php/annonces' == $uri
    && isset($_POST['login']) && isset($_POST['password']) ){
    annonces_action($_POST['login'], $_POST['password']);
}
elseif ('/Annonces/index.php/post' == $uri
    && isset($_GET['id'])) {
    post_action($_GET['id']);
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}
?>