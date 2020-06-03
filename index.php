<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'printComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                printComment($_GET['id']);
            } else {
                throw new Exception('Aucun commentaire trouvé !');
            }
        }
        elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postid']) && $_GET['postid'] > 0) {
                if(!empty($_POST['comment'])) {
                    editComment($_GET['id'], $_POST['comment'], $_GET['postid']);
                } else {
                    throw new Exception('Tout les champs ne sont pas remplis !');
                }
            } else {
                // echo $_GET['id'];
                // var_dump($_GET);
                throw new Exception('Toutes les données ne sont pas envoyés');
            }
        }
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postid']) && $_GET['postid'] > 0) {
                reportComment($_GET['id'], $_GET['postid']);
            } else {
                throw new Exception('Rien à signaler');
            }
        }
        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postid']) && $_GET['postid'] > 0) {
                deleteComment($_GET['id'], $_GET['postid']); 
            } else {
                throw new Exception('Rien à supprimer');
            }
        }
        elseif ($_GET['action'] == 'newPost') {
            newPost();
        }
        elseif ($_GET['action'] == 'addPost') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                addPost($_POST['title'], $_POST['content']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'printPost') {
            if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                printPost($_GET['postid']);
            } else {
                throw new Exception('Aucun chapitre trouvé !');
            }
        }
        elseif ($_GET['action'] == 'editPost') {
            if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    editPost($_GET['postid'], $_POST['title'], $_POST['content']);
                } else {
                    throw new Exception('Tout les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Toutes les données ne sont pas envoyés');
            }
        }
        elseif ($_GET['action'] == 'deletePost') {
            deletePost($_GET['postid']);
        }
        elseif ($_GET['action'] == 'connectAdmin') {
            connectAdmin();
        }
        elseif ($_GET['action'] == 'allAccess') {
            if (isset($_POST['username']) && $_POST['username'] == "Fortécrivain" && isset($_POST['password']) && $_POST['password'] == "JFaisdeslivres") {
                allAccess($_POST['username'], $_POST['password']);
            } else {
                throw new Exception('Nom d\'utilisateur ou mot de passe incorrect');
            }
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
