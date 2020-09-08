<?php
//DATABASE CONNECTION
function open_database_connection()
{
    $link = mysqli_connect('localhost', 'root', '', 'annonces');
    return $link;
}

function close_database_connection($link)
{
    mysqli_close($link);
}

//USERS

function get_all_users()
{
    $link = open_database_connection();
    $resultall = mysqli_query($link,'SELECT login, userID FROM users WHERE userID != "Server"');
    $users = array();
    while ($row = mysqli_fetch_assoc($resultall)) {
        $users[] = $row;
    }
    mysqli_free_result( $resultall);
    close_database_connection($link);
    return $users;

}

function getUserID($login)
{
    $link = open_database_connection();
    $query = 'SELECT userID FROM users WHERE login="'.$login.'"';
    $result = mysqli_query($link, $query);
    if($result){
        $id = mysqli_fetch_assoc($result);
        mysqli_free_result( $result);
    }
    else $id = false;
    close_database_connection($link);
    return $id['userID'];
}

function getUserLogin($id)
{
    $link = open_database_connection();
    $query = 'SELECT login FROM users WHERE userID="'.$id.'"';
    $result = mysqli_query($link, $query);
    if($result){
        $login = mysqli_fetch_assoc($result);
        mysqli_free_result( $result);
    }
    else $login = false;
    close_database_connection($link);
    return $login['login'];
}

function is_user( $login, $password )
{
$isuser = False ;
$link = open_database_connection();
$query= 'SELECT login, userID FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
$result = mysqli_query($link, $query );
if( mysqli_num_rows( $result) )
    $isuser = True;
mysqli_free_result( $result );
close_database_connection($link);
return $isuser;
}

function new_user($login,$pwd,$surname,$name,$mail,$country,$city){
    $link = open_database_connection();
    $query= 'SELECT MAX(userID) AS ID FROM users' ;
    $res = mysqli_query($link, $query );
    $id = mysqli_fetch_assoc($res)['ID']+1;
    $query= 'INSERT INTO users VALUES ("'.$id.'", "'.$login.'", "'.$pwd.'", "'.$surname.'", "'.$name.'", "'.$mail.'", "'.$country.'", "'.$city.'")' ;
    mysqli_query($link, $query );
    close_database_connection($link);
}

function delete_user($userID){
    $link = open_database_connection();
    $query= 'DELETE FROM users WHERE userID = "'.$userID.'"';
    mysqli_query($link, $query );
    close_database_connection($link);
}


//POSTS
function get_all_posts()
{
    $link = open_database_connection();
    $resultall = mysqli_query($link,'SELECT postId, postTitle, userID FROM posts');
    $posts = array();
    while ($row = mysqli_fetch_assoc($resultall)) {
        $posts[] = $row;
    }
    mysqli_free_result( $resultall);
    close_database_connection($link);
    return $posts;
}

function new_post($title, $content, $login){
    $link = open_database_connection();

    $query= 'SELECT MAX(postID) AS ID FROM posts' ;
    $res = mysqli_query($link, $query );
    $id = mysqli_fetch_assoc($res)['ID']+1;


    $query= 'INSERT INTO `posts`(`postID`, `postTitle`, `postContent`, login) VALUES ("'.$id.'", "'.$title.'", "'.$content.'", "'.$login.'")' ;
    mysqli_query($link, $query );
    close_database_connection($link);
}

function get_post( $id )
{
$link = open_database_connection();
$id = intval($id);
$result = mysqli_query($link, 'SELECT * FROM posts WHERE postId='.$id );
$post = mysqli_fetch_assoc($result);
mysqli_free_result( $result);
close_database_connection($link);
return $post;
}

function delete_post($id){
    $link = open_database_connection();
    $query= 'DELETE FROM posts WHERE postID = '.$id;
    mysqli_query($link, $query );
    close_database_connection($link);
}

function est_signalee_posts($postID,$login){
    $link = open_database_connection();

    $isSignaled = false;

    $query= 'SELECT * FROM signalements_post WHERE postID='.$postID.' AND login ="'.$login.'"' ;
    $result = mysqli_query($link, $query );

    if(mysqli_num_rows($result)){
        $isSignaled = true;
    }
    close_database_connection($link);
    return $isSignaled;
}

function signaler_posts($postID,$login){
    if(!est_signalee_posts($postID,$login)) {
        $link = open_database_connection();

        $query = 'INSERT INTO signalements_post VALUES (' . $postID . ', "' . $login . '")';
        mysqli_query($link, $query);
        close_database_connection($link);
    }
}

function signaler_inv_posts($postID,$login){
    if(est_signalee_posts($postID,$login)) {
        $link = open_database_connection();

        $query = 'DELETE FROM signalements_post WHERE postID=' . $postID . ' AND login ="' . $login . '"';
        mysqli_query($link, $query);
        close_database_connection($link);
    }
}

function get_favorites_post($login){
    $link = open_database_connection();

    $isSignaled = false;

    $query= 'SELECT * FROM posts INNER JOIN signalements_post WHERE signalements_post.postID = posts.postID AND signalements_post.login ="'.$login.'"' ;
    $resultall = mysqli_query($link, $query );
    $posts = array();
    while ($row = mysqli_fetch_assoc($resultall)) {
        $posts[] = $row;
    }
    mysqli_free_result( $resultall);
    close_database_connection($link);
    return $posts;
}

//SIGNALEMENTS
function est_signalee($postID,$login){
    $link = open_database_connection();

    $isSignaled = false;

    $query= 'SELECT * FROM signalements WHERE postID="'.$postID.'" AND login ="'.$login.'"' ;
    $result = mysqli_query($link, $query );

    if(mysqli_num_rows($result)){
        $isSignaled = true;
    }
    close_database_connection($link);
    return $isSignaled;
}

function signaler($postID,$login){
    if(!est_signalee($postID,$login)) {
        $link = open_database_connection();

        $query = 'INSERT INTO signalements VALUES ("' . $postID . '", "' . $login . '")';
        mysqli_query($link, $query);
        close_database_connection($link);
    }
}

function signaler_inv($postID,$login){
    if(est_signalee($postID,$login)) {
        $link = open_database_connection();

        $query = 'DELETE FROM signalements WHERE postID="' . $postID . '" AND login ="' . $login . '"';
        mysqli_query($link, $query);
        close_database_connection($link);
    }
}

function get_favorites($login){
    $link = open_database_connection();

    $query= 'SELECT postID FROM signalements WHERE login ="'.$login.'"' ;
    $resultall = mysqli_query($link, $query );
    $offres = array();
    while ($row = mysqli_fetch_assoc($resultall)) {
        $offres[] = $row;
    }
    mysqli_free_result( $resultall);
    close_database_connection($link);
    return $offres;
}



?>

