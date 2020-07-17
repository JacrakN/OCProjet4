<?php $title = "S'enregistrer" ?>

<?php ob_start(); ?>

<p>Vous êtes maintenant inscrit !</p>

<a class="back_option" href="index.php">⬑   Retour à l'acceuil</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>