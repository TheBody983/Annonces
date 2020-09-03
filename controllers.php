<?php
function login_action($login , $error)
{
    require 'view/login.php';
}

function register_action($login, $error)
{
    require 'view/register.php';
}

function annonces_action( $login, $error)
{
    $posts = get_all_posts();
    require 'view/annonces.php';
}

function post_action($id, $login, $error)
{
    $post = get_post($id);

    if(isset($_GET["fav"])){
        signaler_posts($id,$login);
    }
    if(isset($_GET["unfav"])){
        signaler_inv_posts($id,$login);
    }

    require 'view/post.php';
}

function offre_action($id, $login, $error)
{
    require_once 'dataAPI.php';

    if(isset($_GET["fav"])){
        signaler($id,$login);
    }
    if(isset($_GET["unfav"])){
        signaler_inv($id,$login);
    }

    $offre = get_offre($id);
    require 'view/offre.php';
}

function new_action($login, $error)
{
    require 'view/new.php';
}

function favoris_action($login, $error)
{
    $offres = get_favorites($login);
    $posts = get_favorites_post($login);
    require 'view/favoris.php';
}

function admin_action($login, $error)
{
    $posts = get_all_posts();
    $users = get_all_users();
    require 'view/admin.php';
}

function homepage(){
    header("refresh:0;url=http://localhost/Annonces/index.php/annonces");
}

function logout(){

    session_destroy();
    header("refresh:0;url=http://localhost/Annonces/index.php/login");

}



?>
