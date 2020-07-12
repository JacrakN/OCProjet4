<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function checkAdmin() {
    if (!$_SESSION['role'] == 'admin') {
        echo 'Vous n\'êtes pas autorisés à accéder à cette page !';
        require('view/frontend/userLogin.php');
    } else {
        return true;
    }
}
function adminArea() {
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $posts = $postManager->getPosts();
    $comments = $commentManager->getFlagComments();

    if (checkAdmin()) {
        require('view/frontend/admin.php');
    }
}
function deleteCommentAdmin($id) {
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $deletedComment = $commentManager->deleteComment($id);
    $posts = $postManager->getPosts();
    $comments = $commentManager->getFlagComments();

    if ($deletedComment === false) {
        throw new Exception('Impossible de supprimer ce commentaire !');
    } else {
        require('view/frontend/admin.php');
    }
}
function resetReportCount($id) {
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $resetedComment = $commentManager->resetReportCount($id);
    $posts = $postManager->getPosts();
    $comments = $commentManager->getFlagComments();

    if ($resetedComment === false) {
        throw new Exception('Impossible de reset ce commentaire !');
    } else {
        require('view/frontend/admin.php');
    }
}
function newPost() {
    require('view/frontend/newPostView.php');
}
function addPost($title, $content) {
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $postContent = $postManager->postUpload($title, $content);
    $posts = $postManager->getPosts();
    $comments = $commentManager->getFlagComments();

    require('view/frontend/admin.php');
}
function printPost($postId) {
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);
    $nbComments = $commentManager->getCommentCount($postId);

    require('view/frontend/editPostView.php');
}
function editPost($postId, $title, $content) {
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $modifiedPost = $postManager->updatePost($postId, $title, $content);
    $posts = $postManager->getPosts();
    $comments = $commentManager->getFlagComments();

    if ($modifiedPost === false) {
        // throw new Exception('Impossible de modidier ce post');
        echo $postId;
    } else {
        require('view/frontend/admin.php');
    }
}
function deletePost($postId) {
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $deletedPost = $postManager->deletePost($postId);
    $posts = $postManager->getPosts();
    $comments = $commentManager->getFlagComments();

    if ($deletedPost === false) {
        throw new Exception('Impossible de supprimer ce post');
    } else {
        require('view/frontend/admin.php');
    }
}