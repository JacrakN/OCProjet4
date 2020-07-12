<?php $title = "S'enregistrer" ?>

<?php ob_start(); ?>

<h3>S'enregistrer</h3>

<p><a href="index.php" class="back_option">⬑   Retour à l'acceuil</a></p>

<div class="register_part">
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
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>