<?php $title= 'Administration'; ?>

<?php ob_start(); ?>
<div class="containerColumn">
<h2>ATTENTION, CLIQUER SUPPRIME LE POST OU L'UTILISATEUR</h2>

    <h3>Posts</h3>
<ul class="containerColumn">
    <?php foreach( $posts as $post ) : ?>
        <li>
            <?php echo $post["postTitle"]?>
            <button><a href="admin?deletePost=<?php echo $post['postId']; ?>">
                <?php echo 'Supprimer'; ?>
                </a></button>
        </li>
    <?php endforeach ?>
</ul>

<h3>Utilisateurs</h3>
    <ul class="containerList">
    <?php foreach( $users as $user ) : ?>
    <li>
        <?php echo $user["login"]?>
            <button><a href="admin?deleteUser=<?php echo $user['login']; ?>">
                <?php echo 'Supprimer'; ?>
                </a></button>
        </li>
    <?php endforeach ?>
</ul>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>