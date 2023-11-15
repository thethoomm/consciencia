<div class="card" style="width: 18rem;">
  <a href="<?= base_url() ?>noticias/<?= $topic ?>/artigo/<?= toSlug($title) ?>">
    <img src="<?= $imgURL ?>" class="card-img-top" alt="News Photo">
  </a>
  <div class="card-body">
    <h5 class="card-title"><?= $title ?></h5>
    <p class="card-text"><?= $description ?></p>
    <a href="<?= $url ?>" class="btn btn-primary"><?= $source ?></a>
  </div>
</div>