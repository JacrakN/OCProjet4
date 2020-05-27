<?php $title = 'Nouveau Chapitre' ?>

<?php ob_start(); ?>
<h1>"Billet simple pour l'Alaska"</h1>

<a href="index.php"><- Retour</a>

<h2>Modification(s) du chapitre</h2>

<form action="index.php?action=editPost&amp;postid=<?= $post['id'] ?>" method="post"> 
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" value="<?= $post['title'] ?>" />
    </div>
    <div>
        <label for="content"></label><br />
        <textarea id="content" name="content"><?= $post['content'] ?></textarea>
    </div>
    <div>
        <input type="submit"/>
    </div>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>