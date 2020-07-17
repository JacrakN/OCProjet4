<?php $title = "Modifier le chapitre" ?>

<?php ob_start(); ?>

<a class="back_option" href="index.php?action=adminArea">⬑   Retourner dans votre espace</a>

<h3>Modifier le chapitre</h3>

<div class="post_print">

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
  
  <h3><?= $nbComments ?>
  <?php
  if ($nbComments > 1) {
      echo ' Commentaires</h3>';
  } else {
      echo ' Commentaire</h3>';
  }
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
  <br>

<?php
while ($comment = $comments->fetch())
{
?>
  <p><strong><?= htmlspecialchars($comment['author']) ?></strong> <span class="coms_date">le <?= $comment['comment_date_fr'] ?></span></p>

  <p>
    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>" class="admin_delete" onclick="return(confirm('Voulez-vous vraiment supprimer ce commentaire ?'));">Supprimer ce commentaire</a>
  </p>
  </br>
<?php
}
?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>