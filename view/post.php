<?php $title= 'Exemple Annonces Basic PHP: Post'; ?>
<?php ob_start(); ?>
    <h1><?php echo $post['postTitle']; ?></h1>
    <div class="body"> <?php echo $post['postContent']; ?> </div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>