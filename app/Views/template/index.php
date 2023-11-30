<?= $components['header'] ?>
<?= $components['navbar'] ?>
<style>
  .typing-animation {
    overflow: hidden;
    white-space: nowrap;
    animation: typing 2s steps(40, end);
    font-size: 1.75rem;
  }

  @keyframes typing {
    from {
      width: 0;
    }

    to {
      width: 100%;
    }
  }

  @media screen and (max-width: 600px) {
    .typing-animation {
      white-space: normal;
      font-size: 1rem;
    }
  }
</style>
<main class="container-fluid">

  <div class="container pt-5 d-flex justify-content-center flex-column">
    <div>
      <p class="fs-1 fw-semibold">Bem vindo ao Consciência Verde</p>
      <div class="d-flex flex-column lh-1 flex-wrap">
        <p class="mb-0 typing-animation ">
          <span class="fw-semibold text-success">O mundo em suas mãos</span>: notícias ambientais no seu alcance
        </p>
      </div>
      <!-- <div class="mt-5 d-flex">
        <a href="" class="d-inline-block btn btn-success me-3">Em Alta!</a>
        <a href="" class="d-inline-block btn btn-outline-dark">Saiba Mais</a>
      </div> -->
    </div>

    <h4 class="d-block mt-5">Veja o que está em alta nos últimos tempos!</h4>
    <div class="d-flex flex-wrap gap-5 mb-5 mt-3 justify-content-center">
      <?php for ($i = 8; $i < 20; $i++) : ?>
        <?= $cards[$i] ?>
      <?php endfor; ?>
    </div>
    <?= $carrousel ?>
    <div class="d-flex flex-wrap gap-5 mt-5 justify-content-center">
      <?php for ($i = 10; $i < 18; $i++) : ?>
        <?= $cards[$i] ?>
      <?php endfor; ?>
    </div>
  </div>
</main>
<?= $components['footer']?>