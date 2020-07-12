<?php $title = "S'enregistrer" ?>

<?php ob_start(); ?>

<p>Vous êtes maintenant inscrit !</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>