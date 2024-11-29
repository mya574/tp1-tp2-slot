<?php
$headTitle = "Erreur 404";

ob_start();
?>

  <section class="main-sections">
    <h1 class="main-sections-title">
      🩻 Erreur 404 🩻
    </h1>
    <p>
      Le contenu demandé est introuvable.
    </p>
    <a href="/" class="cta-links">
      Retour à l'accueil
    </a>
  </section>

<?php
$mainContent = ob_get_clean();