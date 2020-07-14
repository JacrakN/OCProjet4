<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1 class="book_title">"Billet simple pour l'Alaska" </h1>
<h2 class="written_by">─── écrit par <span class="author_name">Jean Forteroche</span> ───</h2>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="chapters">
        <h3>
            <p class="title_post"><?= htmlspecialchars($data['title']) ?></p>
            <p class="creation_date_post">le <?= $data['creation_date_fr'] ?></p>
        </h3>
        
        <p>
            <?= substr($data['content'], 0, 196) ?>
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="full_chapter">(Lire le chapitre)</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>