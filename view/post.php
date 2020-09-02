<?php $title = $post['postTitle']; ?>
<?php ob_start(); ?>
    <h1><?php echo $post['postTitle']; ?></h1>
    <div class="body"> <?php echo $post['postContent']; ?> </div>
    <a href="annonces">Retour</a>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>