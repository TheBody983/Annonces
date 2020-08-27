<?php
function login_action()
{
    require 'view/login.php';
}
function annonces_action( $login,
                          $password)
{
    if( is_user( $login, $password ) )
        $posts = get_all_posts();
    else
        $login='';
    require 'view/annonces.php';
}
function post_action($id)
{
    $post = get_post($id);
    require 'view/post.php';
}

function register_action()
{
    require 'view/register.php';
}
?>
