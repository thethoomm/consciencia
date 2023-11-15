<?= $components['header'] ?>

<body>
    <div class="container py-5">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <nav class="navbar navbar-light bg-light">
                    <div class="container">
                        <a class="btn " href="<?= url_to('home') ?>">
                            <i class="bi bi-caret-left-fill"></i>
                            Voltar
                        </a>
                    </div>
                </nav>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">Login</h2>
                            <form method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Senha</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-dark">Entrar</button>
                                </div>
                            </form>
                            <div class="text-start fs-6 mt-3">
                                <p>Não tem conta? <a href="<?= url_to('signup') ?>">Cadastre-se</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>