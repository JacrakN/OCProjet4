<?php $title = 'Modifier un commentaire' ?>

<?php ob_start(); ?>

<a href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>" class="back_option">⬑   Retour aux commentaires</a>

<h1 class="book_title">"Billet simple pour l'Alaska" </h1>

<div class="comment_print">

    <p>Modifier un commentaire</p>

    <form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $comment['post_id'] ?>" method="post"> 
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>