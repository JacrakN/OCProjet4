<?php 

session_start();

$_SESSION['username'] = 'Fortécrivain';

?>

<?php $title = 'Espace admin'; ?>

<?php ob_start(); ?>

<h1>Espace administrateur</h1>

<h2>Bonjour <?php echo $_SESSION['username'] ?>, que voulez-vous faire ?</h2>

<p class="admin_logout">
    <a href="index.php?action=logoutAdmin" class="option_logout">Déconnexion</a>
</p>

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
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>