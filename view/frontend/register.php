<?php $title = "S'enregistrer" ?>

<?php ob_start(); ?>

<h2>S'enregistrer</h2>

<form action="index.php?action=registerUser" method="post">
        <div>
            <label for="pseudo">Nom d'utilisateur</label><br />
            <input type="text" id="pseudo" name="pseudo">
        </div>
        <br>
        <div>
            <label for="password">Mot de passe</label><br />
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password2">Confirmer le mot de passe</label><br />
            <input type="password" id="password2" name="password2">
        </div>
        <br>
        <div>
            <input type="submit" id="submit" />
        </div>
</form>

<a href="index.php">Retour à l'acceuil<a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>