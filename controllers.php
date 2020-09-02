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
    require 'view/post.php';
}

function new_action($login, $error)
{
    require 'view/new.php';
}

function refresh(){
            header("refresh:0");
}
?>
