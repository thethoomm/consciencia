<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </head>

    <body>

        <div class="container">

            <h1 class="text-center m-5">Exercícios</h1>

            <div class="row">

                <div class="col-6 mx-auto">

                    <form method="POST">

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="usu_email" class="form-control" id="email">
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha (NÃO use a senha institucional)</label>
                            <input type="password" name="usu_senha" class="form-control" id="senha">
                        </div>

                        <div class="row mt-4">

                            <div class="col text-start">
                                <a href="cadastro" class="btn btn-success">Criar conta</a>    
                            </div>

                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary">Entrar</button>    
                            </div>
							
                        </div>

                    </form>

                    <?php if ( $erros ) : ?>
                        <div class="alert alert-danger my-5"><?= $erros; ?></div>
                    <?php endif; ?>

                    <?php if ( $msg ) : ?>
                        <div class="alert alert-success my-5"><?= $msg; ?></div>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </body>

</html>
