<?php $title = $post['postTitle']; ?>
<?php ob_start(); ?>
<div class="containerColumn">
<h2><?php echo $post['postTitle']; ?></h2>

<?php if(!est_signalee_posts($post['postID'],$login)){ ?>
    <a href="post?id=<?php echo $post['postID']."&fav"?>"><button>Ajouter aux Favoris</button></a>
<?php }
else { ?>
    <a href="post?id=<?php echo $post['postID']."&unfav"?>"><button>Retirer des Favoris</button></a>
<?php } ?>
<br/>
    <div class="body"> <?php echo $post['postContent']; ?> </div>

</br>
    <a href="annonces">Retour</a>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>