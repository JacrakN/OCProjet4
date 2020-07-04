<?php $title = "Nouveau chapitre" ?>

<?php ob_start(); ?>

<a class="back_option" href="index.php?action=adminArea">⬑   Retourner dans votre espace</a>

<h1>Nouveau Chapitre</h1>
      
<form action="index.php?action=addPost" method="post">
  <div>
    <label for="title">Titre</label><br />
    <input type="text" id="title" name="title" />
  </div>

  <div>
    <label for="content"></label><br />
    <textarea id="mytextarea" name="content"></textarea>
  </div>
        
  <div>
    <input type="submit"/>
    </div>
</form>
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>