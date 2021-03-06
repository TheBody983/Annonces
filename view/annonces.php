<?php
include "dataAPI.php";
?>

<?php $title= 'Annonces'; ?>

<?php ob_start(); ?>
    <div class="containerColumn">
<h2>Liste des Posts</h2>
    <ul class="containerColumn">
        <?php foreach( $posts as $post ) : ?>
            <li class="post">
                <a href="post?id=<?php echo $post['postId']; ?>" >
                    <?php echo $post['postTitle']." - ".getUserLogin($post['userID']); ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
    <div class="pagination containerRow">
        <?php
        if($page>1)
        echo '<a href="annonces?page='.($page-1).'">&laquo;</a>';
        echo '<a class="pagination">'.$page.'</a>';
        echo '<a href="annonces?page='.($page+1).'">&raquo;</a>';
        ?>
    </div>
<a href="new"> Nouvelle Annonce </a>
</br>
<h2>Offres du Gouvernement</h2>
<form method="get" action="annonces">
    <label for="name"> Mot-Clé </label> :
    <input type="text" name="name" id="name" required class="input"/>
    <input class="button" type="submit" value="Envoyer">
</form>
<?php
    if(isset($_GET['name'])) {
        $offresListe = offres($_GET['name']);
        if($offresListe) {
            echo '<ul class="containerList">';
            foreach ($offresListe as $nom => $cp):
                echo '<li class="post"><a href="offre?id=' . $nom . '">' . $nom . ' - ' . $cp . '</a></li>';
            endforeach;
            echo '</ul>';
        }
        else {
            echo '<p>Aucun(s) Résultat(s)';;
        }
    }
?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>