<?php $title = $offre['titre']; ?>
<?php ob_start(); ?>

<h2><?php echo $offre['titre']; ?></h2>

<?php if(!est_signalee($offre["code"],$login)){ ?>
<a href="offre?id=<?php echo $offre["code"]."&fav"?>"><button>Ajouter aux Favoris</button></a>
<?php }
else{ ?>
<a href="offre?id=<?php echo $offre["code"]."&unfav"?>"><button>Retirer des Favoris</button></a>
<?php }?>

<?php
echo "<p>Code Annonce : ".$offre["code"]."</p>";
echo "<p>Type d'offre : ".$offre["type"]."</p>";
echo "<p>Commune : ".$offre["commune"]."</p></br>";
echo "<p>Formation demandée : ".$offre["formation"]."</p>";
echo "<p>Expérience demandée : ".$offre["experience"]."</p>";
echo "<p>Compétences demandées : ".$offre["competences"]."</p></br>";
echo "<p>Description : ".$offre["activite "]."</p>";
echo "<p>Diplome demandé : ".$offre["diplome"]."</p></br>";
echo "<p>Contact : ".$offre["contact_identite"]."</p>";
echo "<p>Mail : ".$offre["contact_mail"]."</p>";
echo "<p>Telephone : ".$offre["contact_telephone"]."</p>";?>
<a href="annonces">Retour</a>

<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>