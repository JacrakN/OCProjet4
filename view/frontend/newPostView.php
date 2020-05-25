<?php $title = 'Nouveau Chapitre' ?>

<?php ob_start(); ?>
<h1>"Billet simple pour l'Alaska"</h1>

<a href="index.php"><- Retour</a>

<h2>Modifier un commentaire</h2>

<form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $comment['post_id'] ?>" method="post"> 
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="author" name="author" value="<?= $comment['author'] ?>" />
    </div>
    <div>
        <label for="comment"></label><br />
        <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
    </div>
    <div>
        <input type="submit"/>
    </div>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>