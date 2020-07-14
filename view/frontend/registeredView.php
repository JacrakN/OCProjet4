<?php $title = "S'enregistrer" ?>

<?php ob_start(); ?>

<a class="back_option" href="index.php">⬑   Retour à l'acceuil</a>
<br>
<p>Vous êtes maintenant inscrit !</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>