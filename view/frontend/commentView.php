<?php $title = 'Modifier un commentaire' ?>

<?php ob_start(); ?>
<h1>"Billet simple pour l'Alaska"</h1>

<a href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">⬑   Retour aux commentaires</a>

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
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>