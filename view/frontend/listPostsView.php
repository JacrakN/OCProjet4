<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>"Billet simple pour l'Alaska" </h1>
<h2>────── écrit par <span class="author_name">Jean Forteroche</span> ──────</h2>

<p class="admin_connection">
    <a href="index.php?action=connectAdmin" class="option_connection">Connexion</a>
</p>

<p class="last_chapter">Derniers chapitres :</p>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <p class="title_post"><?= htmlspecialchars($data['title']) ?></p>
            <p class="creation_date_post"><em>le <?= $data['creation_date_fr'] ?></em></p>
        </h3>
        
        <p>
            <?= $data['content'] ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="list_coms">(Commentaires)</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>