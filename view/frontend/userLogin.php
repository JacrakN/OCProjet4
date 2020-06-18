<?php $title = "Connexion" ?>

<?php ob_start(); ?>

<h2>Connexion</h2>

<form action="index.php?action=loginUser" method="post">
        <div>
            <label for="pseudo">Nom d'utilisateur</label><br />
            <input type="pseudo" id="pseudo" name="pseudo">
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