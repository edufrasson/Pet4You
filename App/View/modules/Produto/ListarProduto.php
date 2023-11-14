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
                    <p>Cadastro de Produtos </p>
                </div>
            </div>
            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button class="btn btn-pet" data-bs-toggle="modal" data-bs-target="#modalProduto">Novo Produto</button>
                </div>
                <div class="containers-card table-container">
                    <div class="loading-container d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <table class="table-style table table-bordered">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Categoria</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model->rows as $produto) : ?>
                                <tr>
                                    <td><?= $produto->descricao ?></td>
                                    <td><?= $produto->categoria ?></td>
                                    <td class="actions-list">
                                        <a href="/editar_produto?id=<?= $produto->id ?>">
                                            <box-icon name="edit" color="#eb5cfe" id="<?= $produto->id ?>" data-bs-toggle="modal" data-bs-target="#modalProduto" class="btn-icon btn-edit"></box-icon>
                                        </a>
                                        <box-icon name="trash" color="#eb5cfe" id="<?= $produto->id ?>" class="btn-icon btn-delete"></box-icon>
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
    <div class="modal fade modal-bootstrap" id="modalProduto" tabindex="-1" role="dialog" aria-labelledby="modalProdutoTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProdutoTitle">Cadastrar Produto</h5>
                </div>
                <form method="post" action="/produto/save">
                    <div class="modal-body">
                        <div class="input-row">
                            <div class="input-container mb-3">
                                <input type="hidden" name="id" id="id">
                                <label for="descricao">Descrição:</label>
                                <input type="text" name="descricao" class="form-control" id="descricao" required maxlength="45">
                            </div>
                            <div class="input-container mb-3">
                                <input type="hidden" name="id" id="id">
                                <label for="preco">Preço (R$):</label>
                                <input type="number" name="preco" class="form-control" id="preco" required maxlength="45">
                            </div>
                        </div>
                        <div class="input-row">
                            <label for="id_categoria">Categoria:</label><br>
                            <select class="form-select" name="id_categoria" id="id_categoria" required>
                                <?php if ($model->lista_categorias == null) : ?>
                                    <option value="">Cadastre uma categoria primeiro!</option>
                                <?php else : ?>
                                    <option value="">Selecione uma categoria!</option>
                                    <?php foreach ($model->lista_categorias as $categoria) : ?>

                                        <option value=<?= $categoria->id ?>><?= $categoria->descricao ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-pet" id="adicionarProduto">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.produto.js"></script>
</body>

</html>