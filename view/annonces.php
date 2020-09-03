<?php
include "dataAPI.php";
?>

<?php $title= 'Annonces'; ?>

<?php ob_start(); ?>
    <h2>Liste des Posts</h2>
    <ul>
        <?php foreach( $posts as $post ) : ?>
            <li>
                <a href="post?id=<?php echo $post['postId']; ?>">
                    <?php echo $post['postTitle']." - ".$post['login']; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<a href="new"> Nouvelle Annonce </a>
</br>
<h2>Offres du gouvernement</h2>
<form method="get" action="annonces">
    <label for="name"> Mot-Clé </label> :
    <input type="text" name="name" id="name" required />
    <input type="submit" value="Envoyer">
</form>
<?php
    if(isset($_GET['name'])) {
        $offresListe = offres($_GET['name']);
        if($offresListe) {
            echo "<ul>";
            foreach ($offresListe as $nom => $cp):
                echo '<li><a href="offre?id=' . $nom . '">' . $nom . ' - ' . $cp . '</a></li>';
            endforeach;
            echo '</ul>';
        }
        else {
            echo '<p>Aucun(s) Résultat(s)';;
        }
    }
?>


<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>