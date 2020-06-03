<?php $title = "Connexion (admin)" ?>

<?php ob_start(); ?>

<h2>Accès aux droits administrateur</h2>

<form action="index.php?action=allAccess" method="post">
        <div>
            <label for="username">Nom d'utilisateur</label><br />
            <input type="username" id="username" name="username">
        </div>
        <br>
        <div>
            <label for="password">Mot de passe</label><br />
            <input type="password" id="password" name="password">
        </div>
        <br>
        <div>
            <input type="submit" />
        </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>