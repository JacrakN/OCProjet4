<?php $title = "Modifier le chapitre" ?>

<?php ob_start(); ?>

<a class="back_option" href="index.php?action=adminArea">⬑   Retourner dans votre espace</a>

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
  
  <h2><?= $nbComments ?>
  <?php
  if ($nbComments > 1) {
      echo ' Commentaires</h2>';
  } else {
      echo ' Commentaire</h2>';
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
  <?php
  if ($_SESSION['pseudo'] != $comment['author']) {
  ?>
    <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>" class="admin_delete" onclick="return(confirm('Voulez-vous vraiment supprimer ce commentaire ?'));">Supprimer ce commentaire</a>
  <?php
  }
  ?>
  </p>
  <?php
  if ($_SESSION['pseudo'] == $comment['author']) {
  ?>
  <p>
    <a href="index.php?action=printComment&amp;id=<?= $comment['id'] ?>" class="coms_options"> ✎ Modifier</a> 
    | <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>" class="coms_options" onclick="return(confirm('Voulez-vous vraiment supprimer ce commentaire ?'));">Supprimer</a>
  </p>
  <?php
  }
  ?>
  <br>
  <?php
  }
  ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>