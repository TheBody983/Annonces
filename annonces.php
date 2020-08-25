<?php
$link = mysqli_connect('localhost', 'root', '', 'jobstage_db');
$query= 'SELECT login FROM Users WHERE
login="'.$_POST['login'].'" and password="'.$_POST['password'].'"';
$resultlogin = mysqli_query($link, $query );
if( mysqli_num_rows( $resultlogin) ){
$login = $_POST['login'];
mysqli_free_result( $resultlogin );
$resultall = mysqli_query($link, 'SELECT postId, postTitle FROM posts');
$posts = array();
while ($row = mysqli_fetch_assoc($resultall)) {
$posts[] = $row;
}
}
mysqli_close( $link );
// inclut le code de la présentation HTML
require 'view/annonces.php';
?>