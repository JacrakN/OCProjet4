<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<a class="back_option" href="index.php">⬑   Retour à l'acceuil</a>

<h1 class="book_title">"Billet simple pour l'Alaska" </h1>

<div class="chapter">
    <h2>
        <?= htmlspecialchars($post['title']) ?>
    </h2>
    
    <p>
        <?= $post['content'] ?>
    </p>
</div>

<div class="comments_part">

    <h3><?= $nbComments ?>
    <?php
    if ($nbComments > 1) {
        echo ' Commentaires</h3>';
    } else {
        echo ' Commentaire</h3>';
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

        <p class="written_comment">
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
        if ($_SESSION['role'] == 'admin') {
        ?>
        <p>
            <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>" class="admin_delete" onclick="return(confirm('Voulez-vous vraiment supprimer ce commentaire ?'));">Supprimer ce commentaire</a>
        </p>
        <?php
        }
        ?>

        <br>
    <?php
    }
    ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
