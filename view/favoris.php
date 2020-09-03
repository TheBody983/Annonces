<?php
include "dataAPI.php";

?>

<?php $title= 'Annonces'; ?>

<?php ob_start(); ?>
    <h2>List of Posts</h2>
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


<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>