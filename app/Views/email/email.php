<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= ucwords($topic) ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
  <div class="container">
    <h1 class="mt-4 mb-4 text-light">Notícias sobre <?= ucwords($topic) ?></h1>
    <ul class="list-group">
      <?php for ($i = 0; $i < 9; $i++) : ?>
        <?php $article = $news[$i] ?>
        <li class="list-group-item mb-4">
          <h2><?= $article['title'] ?></h2>
          <p><?= $article['description'] ?></p>
          <a href="<?= $article['url'] ?>" class="btn btn-primary">Leia mais</a>
        </li>
      <?php endfor; ?>
    </ul>
  </div>
</body>

</html>