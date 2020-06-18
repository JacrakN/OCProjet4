<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="public/css/style.css" rel="stylesheet" /> 
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
  </head>

  <body>
    <a class="edit_uturn" href="index.php?action=adminArea"><- Retour à l'espace admninitrateur</a>

    <h1>Modifier le chapitre</h1>
        <form action="index.php?action=editPost&amp;postid=<?= $post['id'] ?>" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" value="<?= $post['title'] ?>" />
        </div>

        <div>
            <label for="content"></label><br />
            <textarea id="mytextarea" name="content"><?= $post['content'] ?></textarea>
        </div>
        
        <div>
            <input type="submit"/>
        </div>
        </form>

    <h2>Gérer les commentaires</h2>
        <?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> <span class="coms_date">le <?= $comment['comment_date_fr'] ?></span></p>

    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <p>
        <a href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>" class="coms_options">⚐ Signaler</a>
          <a href="index.php?action=printComment&amp;id=<?= $comment['id'] ?>" class="coms_options">✎ Modifier</a> 
          <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>" class="coms_options" onclick="return(confirm('Supprimer ce commentaire ?'));">(-) Supprimer</a>
    </p>
    <br>
<?php
}
?>
  </body>
</html>
