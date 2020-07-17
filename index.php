<?php
require('controller/frontend.php');
require('controller/backend.php');

session_start();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_SESSION['role'])) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment'])) {
                        addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Aucun identifiant envoyé');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_SESSION['role'])) {
                if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postid']) && $_GET['postid'] > 0) {
                    reportComment($_GET['id'], $_GET['postid']);
                } else {
                    throw new Exception('Rien à signaler');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postid']) && $_GET['postid'] > 0) {
                        deleteComment($_GET['id'], $_GET['postid']); 
                    } else {
                        throw new Exception('Rien à supprimer');
                    }
                } else {
                    throw new Exception('Vous n\'êtes pas autorisé à supprimer ce commentaire !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'deleteCommentAdmin') {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        deleteCommentAdmin($_GET['id']); 
                    } else {
                        throw new Exception('Rien à supprimer');
                    }
                } else {
                    throw new Exception('Vous n\'êtes pas autorisé à supprimer ce commentaire !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'resetReportCount') {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        resetReportCount($_GET['id']);
                    } else {
                        throw new Exception('Aucun commentaire à reset');
                    }
                } else {
                    throw new Exception('Vous n\'êtes pas administrateur !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'newPost') {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    newPost();
                } else {
                    throw new Exception('Vous n\'êtes pas administrateur !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'addPost') {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        addPost($_POST['title'], $_POST['content']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Vous n\'êtes pas administrateur !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'printPost') {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                        printPost($_GET['postid']);
                    } else {
                        throw new Exception('Aucun chapitre trouvé !');
                    }
                } else {
                    throw new Exception('Vous n\'êtes pas administrateur !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'editPost') {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                        if (!empty($_POST['title']) && !empty($_POST['content'])) {
                            editPost($_GET['postid'], $_POST['title'], $_POST['content']);
                        } else {
                            throw new Exception('Tout les champs ne sont pas remplis !');
                        }
                    } else {
                        throw new Exception('Toutes les données ne sont pas envoyés');
                    }
                } else {
                    throw new Exception('Vous n\'êtes pas administrateur !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'deletePost') {
            deletePost($_GET['postid']);
        }
        elseif ($_GET['action'] == 'login') {
            login();
        }
        elseif ($_GET['action'] == 'adminArea') {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    adminArea();
                } else {
                    throw new Exception('Vous n\'êtes pas administrateur !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas connecté !');
            }
        }
        elseif ($_GET['action'] == 'logout') {
            session_destroy();
            logout();
        }
        elseif ($_GET['action'] == 'register') {
            register();
        }
        elseif ($_GET['action'] == 'registerUser') {
            if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
                if (($_POST['password']) == ($_POST['password2'])) {
                    registerUser($_POST['pseudo'], $_POST['password']);
                } else {
                    throw new Exception('Les mots de passe sont différents !');
                }
            } else {
                throw new Exception('Tout les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'loginUser') {
            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                loginUser($_POST['pseudo'], $_POST['password']);
            } else {
                throw new Exception('Tout les champs ne sont pas remplis !');
            }
        }
        else {
            throw new Exception('Oups ! Cette page n\'existe pas');
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    error($e);
}
