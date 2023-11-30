<div>
  <div class="card h-100" style="width: 18rem;">
    <a href="#">
      <img src="<?= $imgURL ?>" class="card-img-top" alt="News Photo">
    </a>
    <div class="card-body d-flex flex-column h-100">
      <h5 class="card-title"><?= $title ?></h5>
      <p class="card-text flex-grow-1"><?= $description ?></p>
      <div class="mt-auto">
        <a href="<?= $url ?>" class="btn btn-success"><?= $source ?></a>
        <div class="card-footer mt-2">
          <p class="text-body-secondary" >Publicado há: <?= $date ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
