<?php $title = 'Espace admin'; ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des chapitres</a></p>

<h1>Espace administrateur</h1>

<div class="admin_options">
    <p class="admin_newchapter">
        <a href="index.php?action=newPost" class="option_newchapter">(+) Ajouter un nouveau chapitre</a>
    </p>
    <p class="admin_edit">Gérer les chapitres ▼</p>
    <?php
while ($data = $posts->fetch())
{
?>
    <div class="chapter_list_admin">
        <p class="admin_title_post"><?= htmlspecialchars($data['title']) ?></p> | 
        <p class="admin_creation_date_post">posté le <?= $data['creation_date_fr'] ?></p>
            
        <p>
            <a href="index.php?action=printPost&amp;postid=<?= $data['id'] ?>" class="admin_edit_chapter">(Modifier/Gérer)</a>
            <a href="index.php?action=deletePost&amp;postid=<?= $data['id'] ?>" class="admin_delete" onclick="return(confirm('Voulez-vous vraiment supprimer ce chapitre ?'));">🗑</a>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
    <div class="flag_Comments_list">
        <p class="admin_coms_mod">Gérer les commentaires</p>

<?php
while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['author']) ?></strong> <span class="coms_date">le <?= $comment['comment_date'] ?></span></p>
<p>
    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    <a href="index.php?action=deleteComment&amp;postid=<?= $data['id'] ?>" class="admin_delete" onclick="return(confirm('Voulez-vous vraiment supprimer ce commentaire ?'));">x</a>
</p>
<?php
}
?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>