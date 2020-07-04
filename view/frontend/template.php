<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/simplex/bootstrap.min.css" rel="stylesheet" /> 
        <link href="public/css/style.css" rel="stylesheet" /> 
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    </head>
        
    <body>
        <div class="top_options">
        <?php 
        if (isset($_SESSION['id']) && isset($_SESSION['pseudo']) && isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'user') {
                echo '<div>
                        Bonjour ' . $_SESSION['pseudo'] . '
                        <p class="admin_logout">
                            <a href="index.php?action=logout" class="option_logout">➜] Se déconnecter</a>
                        </p>
                    </div>';
            } else {
                echo '<div>
                        <p class="admin_area">
                            <a href="index.php?action=adminArea" class="option_admin_area">Espace Administrateur 🔑</a>
                        </p>
                        <p> - Bonjour ' . $_SESSION['pseudo'] . '... oh mais bien sûr ! C\'est vous l\'administrateur !</p>
                        <p class="admin_logout">
                            <a href="index.php?action=logout" class="option_logout">➜]   Se déconnecter</a>
                        </p>
                    </div>';
            }
        } else {
            echo '<a href="index.php?action=login" class="option_login">Se Connecter</a>
                <p class="admin_login">
                    <a href="index.php?action=register">Inscription</a>
                </p>';
        }
        ?>
        </div>

        <div class="main_part">
        <?= $content ?>
        </div>
    </body>
</html>
