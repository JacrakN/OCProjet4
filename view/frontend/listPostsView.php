<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>"Billet simple pour l'Alaska" </h1>
<h2>────── écrit par <span class="author_name">Jean Forteroche</span> ──────</h2>

<p class="admin_connection">
    <a href="index.php?action=connectAdmin" class="option_connection">Connexion</a>
</p>
<p class="admin_newchapter">
    <a href="index.php?action=newPost" class="option_newchapter">(+) Ajouter un nouveau chapitre</a>
</p>

<p class="last_chapter">Derniers chapitres :</p>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <p class="creation_date_post"><em>le <?= $data['creation_date_fr'] ?></em></p>
            
            <p>
                <a href="index.php?action=printPost&amp;postid=<?= $data['id'] ?>" class="admin_edit">Modifier</a> | 
                <a href="index.php?action=deletePost&amp;postid=<?= $data['id'] ?>" class="admin_delete">(-) Supprimer</a>
            </p>
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