<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'View/includes/css_config.php' ?>
    <title>Cliente - Gestão Pet4You</title>
</head>

<body>

    <?php include 'View/includes/navbar.php' ?>
    <main class="main-container">
        <div class="container-card">
            <div class="header-card">
                <div class="text-container-header-card">
                    <p>Cadastro de Categorias </p>
                </div>
            </div>
            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button class="btn btn-pet" data-bs-toggle="modal" data-bs-target="#modalCategoria">Nova Categoria</button>
                </div>
                <div class="containers-card table-container">
                    <table class="table-style table table-bordered">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model->rows as $categoria) : ?>
                                <tr>
                                    <td><?= $categoria->descricao ?></td>
                                    <td class="actions-list">
                                        <box-icon name="edit" color="#eb5cfe" id="<?= $categoria->id ?>" data-bs-toggle="modal" data-bs-target="#modalCategoria" class="btn-icon btn-edit"></box-icon>
                                        <box-icon name="trash" color="#eb5cfe" id="<?= $categoria->id ?>" class="btn-icon btn-delete"></box-icon>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="containers-card action-table-container">

                </div>
            </div>
            <div class="footer-card">

            </div>
        </div>
    </main>
    <div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="modalCategoriaTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCategoriaTitle">Cadastrar Categoria</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post" action="/categoria/save">
                    <div class="modal-body">
                        <div class="input-container">
                            <input type="hidden" name="id" id="id">
                            <label for="descricao">Descrição:</label>
                            <input type="text" name="descricao" class="form-control" id="descricao" required maxlength="45">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-pet" id="adicionarCategoria">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.categoria.js"></script>
</body>

</html>