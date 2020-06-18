<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['pseudo']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'user') {
        echo 'Bonjour ' . $_SESSION['pseudo'];
        echo '<p class="admin_logout">
                <a href="index.php?action=login" class="option_logout">Déconnexion</a>
            </p>';
    } else {
        echo '<a href="index.php?action=adminArea">Espace Administrateur</a>';
        echo 'Bonjour ' . $_SESSION['pseudo'] . '... oh mais bien sûr ! C\'est vous l\'administrateur !';
        echo '<p class="admin_logout">
                <a href="index.php?action=login" class="option_logout">Déconnexion</a>
            </p>';
    }
} else {
    echo '<a href="index.php?action=login" class="option_login">Se Connecter</a>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?= $content ?>
    </body>
</html>
