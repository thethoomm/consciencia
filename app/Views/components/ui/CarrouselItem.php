<style>
  .img-carrousel {
    width: 100%;
    height: 13rem;
    object-fit: cover;
    
  }

  .carousel-caption > h5 {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, .5);
  }
</style>
<div class="carousel-item <?= $active ?>">
  <img src="<?= $imgURL ?>" class="d-block img-carrousel" alt="Slide">
  <div class="carousel-caption d-none d-md-block">
    <h5><?= $title ?></h5>
    <a class="btn btn-success" href="<?= $url ?>">Veja mais em <?= strtolower($source)?></a>
  </div>
</div>