<?php
include "dataAPI.php";

?>

<?php $title= 'Favoris'; ?>

<?php ob_start();
if(isset($posts)){?>
    <h2>Liste des Posts</h2>
    <ul>
        <?php foreach( $posts as $post ) : ?>
            <li>

                <a href="post?id=<?php echo $post['postID']; ?>">
                    <?php echo $post['postTitle']; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
    <?php
}?>
    <h2>Liste des Annonces</h2>
<?php
if($offres){
?>
    <ul>
        <?php foreach( $offres as $offre ) :
            $offre = get_offre($offre['postID']);?>
            <li>
                <a href="offre?id=<?php echo $offre['code']; ?>">
                    <?php echo $offre['titre']; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<?php }
else
    {
    $error = "offres.noresult";
    echo "<p> Aucun Résultat</p>";
    }
?>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>