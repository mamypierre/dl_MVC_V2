<?php $title = "Pas de contenue!"; ?>

<?php ob_start(); ?>
<p> Erreur aucun contenue!</p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>