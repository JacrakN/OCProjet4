<?php $title = 'Espace admin'; ?>

<?php ob_start(); ?>

<p><a href="index.php" class="back_option">⬑   Retour à l'acceuil</a></p>

<h1>Espace administrateur</h1>

<div class="admin_options">
    <button onclick="location.href='index.php?action=newPost'" class="admin_newchapter">(+) Ajouter un nouveau chapitre</button>
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
            <a href="index.php?action=deletePost&amp;postid=<?= $data['id'] ?>" class="admin_delete_chapter" onclick="return(confirm('Voulez-vous vraiment supprimer ce chapitre ?'));">Supprimer</a>
        </p>
    </div>
<?php
}
?>
    <div class="flag_Comments_list">
        <p class="admin_coms_mod">🔍 Commentaires signalés</p>

<?php
while ($comment = $comments->fetch())
{
?>
<p>
    <strong><?= htmlspecialchars($comment['author']) ?></strong>
    <span class="coms_date">le <?= $comment['comment_date'] ?></span>
     - 🏁 <span class="coms_flag_count">Signalé <?= $comment['report'] ?> fois <a href="index.php?action=resetReportCount&amp;id=<?= $comment['id'] ?>" class="reset_report">(Reset le compteur)</a></span>
</p>
<p>
    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    <a href="index.php?action=deleteCommentAdmin&amp;id=<?= $comment['id'] ?>" class="admin_delete" onclick="return(confirm('Voulez-vous vraiment supprimer ce commentaire ?'));">Supprimer ce commentaire</a>
</p>
<?php
}
?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>