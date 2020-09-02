
<?php $title= 'Annonces'; ?>

<?php ob_start(); ?>
    <h2>List of Posts</h2>
    <ul>
        <?php foreach( $posts as $post ) : ?>
            <li>
                <a href="post?id=<?php echo $post['postId']; ?>">
                    <?php echo $post['postTitle']; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<a href="new"> Nouvelle Annonce </a>

<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>