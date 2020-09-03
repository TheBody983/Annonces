<?php $title= 'Administration'; ?>

<?php ob_start(); ?>
<h2>ATTENTION, CLIQUER SUPPRIME LE POST OU L'UTILISATEUR</h2>
<ul>
    <?php foreach( $posts as $post ) : ?>
        <li>
            <a href="admin?deletePost=<?php echo $post['postId']; ?>">
                <?php echo $post['postTitle']; ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<ul>
    <?php foreach( $users as $user ) : ?>
        <li>
            <a href="admin?deleteUser=<?php echo $user['login']; ?>">
                <?php echo $user['login']; ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>