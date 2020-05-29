<?php $title = "Connexion (admin)" ?>

<?php ob_start(); ?>

<h2>Accès aux droits administrateur</h2>

<form action="index.php?action=adminAccess" method="post">
    <p>
        <label for="motdepasse">Mot de passe</label><br />
        <input type="password" name="motdepasse">

        <input type="submit" />
    </p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>