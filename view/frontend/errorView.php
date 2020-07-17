<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>

<figure>
	<div class="sad-mac"></div>
	<figcaption>
		<span class="sr-text">Error 404: Not Found</span>
		<span class="e"></span>
		<span class="r"></span>
		<span class="r"></span>
		<span class="o"></span>
		<span class="r"></span>
		<span class="_4"></span>
		<span class="_0"></span>
		<span class="_4"></span>
		<span class="n"></span>
		<span class="o"></span>
		<span class="t"></span>
		<span class="f"></span>
		<span class="o"></span>
		<span class="u"></span>
		<span class="n"></span>
		<span class="d"></span>
    </figcaption>
</figure>
<p class="error_msg"><?= $msgError ?></p>
</br>
<p><a href="index.php" class="back_option">⬑   Retour à l'acceuil</a></p>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>