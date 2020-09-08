<?php
include "dataAPI.php";

?>

<?php $title= 'Favoris'; ?>

<?php ob_start();?>
<div class="containerColumn">
    <h2>Liste des Posts</h2>
<?php if($posts){?>
    <ul class="containerColumn">
        <?php foreach( $posts as $post ) : ?>
            <li>

                <a href="post?id=<?php echo $post['postID']; ?>">
                    <?php echo $post['postTitle']; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<?php }
else
{
    $error = "offres.noresult";
    echo "<li> Aucun Résultat</li>";
}
?>
    <h2>Liste des Annonces</h2>
<?php
if($offres){
?>
    <ul class="containerColumn">
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
    echo "<li> Aucun Résultat</li>";
    }
?>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>