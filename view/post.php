<?php $title = $post['postTitle']; ?>
<?php ob_start(); ?>
    <h1><?php echo $post['postTitle']; ?>
<?php if(!est_signalee_posts($post['postID'],$login)){ ?>
    <a href="post?id=<?php echo $post['postID']."&fav"?>"><button>ajouter aux Favoris</button></a>
<?php }
else { ?>
    <a href="post?id=<?php echo $post['postID']."&unfav"?>"><button>retirer des Favoris</button></a>
<?php } ?> </h1>
    <div class="body"> <?php echo $post['postContent']; ?> </div>
</br>
    <a href="annonces">Retour</a>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>