<?php
  $headTitle = "Liste des articles";

  if(!isset($articlesList) || !$articlesList){
    $mainContent = "Erreur 404";
    exit;
  }

  ob_start();
?>

<section class="main-sections">
  <h1 class="main-sections-title">Liste des articles</h1>
  <?php foreach($articlesList as $article): ?>
    <article class="main-articles">
      <h2 class="main-articles-title"><?= $article->title ?> - Par <?= $article->author ?></h2>
      <p>
        <?= $article->content ?>
      </p>
      <a href="/articles/update/<?= $article->id?>" class="cta-links">
        Mettre à jour l'article
      </a>
      <form  action="/articles/delete" method="POST">
        <input type="hidden" value="<?=$article->id?>" name="id" required/>
        <button type="submit">
            supprimer
        </button>

      </form>
    </article>
  <?php endforeach; ?>
</section>

<?php 
$mainContent = ob_get_clean();