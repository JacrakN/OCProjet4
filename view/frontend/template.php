<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
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
                echo 'Bonjour ' . $_SESSION['pseudo'] . '
                        <div class="button_logout" id="button-menu">
                            <a href="index.php?action=logout" class="option_logout">➜]   Se déconnecter</a>
                        </div>';
            } else {
                echo '<div class="button_admin_area" id="button-menu">
                        <div id="underline-2"></div>
                        <a href="index.php?action=adminArea" class="option_admin_area">Espace Administrateur 🔑</a>
                    </div>
                    - Bonjour ' . $_SESSION['pseudo'] . '... oh mais bien sûr ! C\'est vous l\'administrateur !
                    <div class="button_logout" id="button-menu">
                        <a href="index.php?action=logout" class="option_logout">➜]   Se déconnecter</a>
                    </div>';
            }
        } else {
            echo '<div class="button_id">
                    <div class="button_login" id="button-menu">
                        <div id="underline-1"></div>
                        <a href="index.php?action=login" class="option_login">Se Connecter</a>
                    </div>
                    <div class="button_register" id="button-menu">
                        <div id="underline-1"></div>
                        <a href="index.php?action=register" class="option_register">Inscription</a>
                    </div>
                </div>';
        }
        ?>
        </div>

        <div class="main_part">
        <?= $content ?>
        </div>
    </body>

    <footer>
        © Thery David - OC Projet 2020
    </footer>
</html>
