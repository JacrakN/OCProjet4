<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>"Billet simple pour l'Alaska"</h1>
<a class="back_option" href="index.php">⬑   Retour à l'acceuil</a>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em> · le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= $post['content'] ?>
    </p>
</div>

<h2><?= $nbComments ?>
<?php
if ($nbComments > 1) {
    echo ' Commentaires</h2>';
} else {
    echo ' Commentaire</h2>';
}
?>

<?php
if (isset($_SESSION['pseudo'])) {
?>
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="comment">Ajouter un commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
<?php
}
?>

<?php
while ($comment = $comments->fetch()) {
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> <span class="coms_date">le <?= $comment['comment_date_fr'] ?></span></p>

    <p>
        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    </p>

    <?php
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'user' && $_SESSION['pseudo'] != $comment['author']) {
    ?>
    <p>
        <a href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>" class="coms_options">⚐ Signaler</a>
    </p>
    <?php
        }
    }
    ?>

    <?php
    if (isset($_SESSION['pseudo'])) {
        if ($_SESSION['pseudo'] == $comment['author']) {
    ?>
    <p>
        <a href="index.php?action=printComment&amp;id=<?= $comment['id'] ?>" class="coms_options"> ✎ Modifier</a> 
        | <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>" class="coms_options" onclick="return(confirm('Voulez-vous vraiment supprimer ce commentaire ?'));">Supprimer</a>
    </p>
    <?php
        }
    }
    ?>

    <br>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
