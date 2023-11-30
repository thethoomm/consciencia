<nav class="navbar navbar-expand-lg bg-black px-5">
  <div class="container-fluid">
    <a class="navbar-brand text-light fw-bold" href="<?= url_to('home') ?>">EcoMente</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="<?= url_to('home') ?>">Home</a>
        </li>
        <?php foreach ($GLOBALS['topics'] as $topic) : ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= base_url() ?>noticias/topicos/<?= toSlug($topic) ?>"><?= $topic ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="ms-auto me-5 navbar-nav">
        <li class="nav-item" id="weather">
          <a class="nav-link text-white-50" style="font-size: .9rem;" href="">
            <?= $weather['city'] ?>, <?= ucwords($weather['description']) ?> - <?= $weather['temperature'] ?>°C
          </a>
        </li>
        <?php if (session()->has('user')) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= session()->get('user')->name ?>
            </a>
            <ul class="dropdown-menu">
              <?php if (session()->get('user')->role == 'ADMIN') : ?>
                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
              <?php endif; ?>
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li><a class="dropdown-item" href="#">Configurações</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Sair
                </button>
              </li>
            </ul>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= url_to('login') ?>">Login</a>
          </li>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Deseja mesmo sair?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="<?= url_to('logout') ?>" type="button" class="btn btn-primary">Sair</a>
      </div>
    </div>
  </div>
</div>