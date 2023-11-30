<!DOCTYPE html>
<html lang="en">

<?= $components['head'] ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?= $components['sidebar'] ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?= $components['topbar'] ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Categorias</h1>
                    <p class="mb-4">Tabela para gerenciamento das categorias de cursos presentes no site </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 cabeca">
                            <h6 class="m-0 font-weight-bold ">Categorias de Cursos</h6>
                            <a href="CadastraCategoria"><svg xmlns="http://www.w3.org/2000/svg" style="color: green" width="21" height="21" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if (!$categorias) { ?>
                                    <h1>Sem categorias cadastradas</h1>
                                <?php } else { ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>Opções</th>
                                        </thead>

                                        <tbody>
                                            <?php for ($i = 0; $i < count($categorias); $i++) {
                                                $categoria = $categorias[$i];
                                                
                                            ?>
                                                <tr>
                                                    <td><?= $categoria['id_categoria']?></td>
                                                    <td><?= $categoria['nome_categoria']?></td>
                                               
                                                    <td>
                                                        <a href="<?= $GLOBALS['baseurl'] ?>admin/tabelas/categorias/remover/<?= toslug($categoria['nome_categoria']) ?>" class="remover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: red;" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                            </svg></a>
                                                        <a href="<?= $GLOBALS['baseurl'] ?>admin/tabelas/categorias/atualizar/<?= toslug($categoria['nome_categoria']) ?>" class="atualizar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="color: blue;" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                            </svg></a>
                                                        <a href="<?= $GLOBALS['baseurl'] ?>admin/tabelas/categorias/<?= toslug($categoria['nome_categoria']) ?>/ver" class="ver">
                                                            <svg xmlns="http://www.w3.org/2000/svg" style="color: gray;" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
            <?= $components['footer'] ?>
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->                                                 
</body>
<?= $components['cors']?>
</html>