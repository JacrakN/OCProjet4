<?php $title = "Connexion" ?>

<?php ob_start(); ?>

<h3>Connexion</h3>

<p><a href="index.php" class="back_option">⬑   Retour à l'acceuil</a></p>

<div class="login_part">
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
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>