<?= $components['header'] ?>
<?= $components['navbar'] ?>
<main class="container-fluid">

  <div class="container pt-5 d-flex justify-content-center flex-column">
    <div class="d-flex justify-content-center">
      <p class="fs-1 fw-semibold text-center"><?= $topic ?></p>
    </div>
    <?= $carrousel ?>
    <div class="d-flex flex-wrap gap-5 mt-5 justify-content-center">
      <?php foreach ($cards as $card) : ?>
        <?= $card ?>
      <?php endforeach; ?>
    </div>
  </div>
</main>