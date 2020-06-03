<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
  </head>

  <body>
    <a class="edit_uturn" href="admin.php">Retour</a>

    <h1>Nouveau Chapitre</h1>
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
  </body>
</html>
