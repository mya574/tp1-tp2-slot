<?php
  if(!isset($article) || !$article){
    $mainContent = "Erreur 404";
    exit;
  }

  $headTitle = $article->title;
?>

<section class="main-sections">
  <article class="main-articles">
    <h1 class="main-articles-title">
      <?= $article->title ?> - Par <?= $article->author ?>
    </h1>
    <p>
      <?= $article->content ?>
    </p>
  </article>
</section>

<?php
$mainContent = ob_get_clean();