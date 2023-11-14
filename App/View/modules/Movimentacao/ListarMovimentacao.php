<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/modules/Movimentacao/movimentacao.css">
    <?php include 'View/includes/css_config.php' ?>
    <title>Cliente - Gestão Pet4You</title>
</head>

<body>
    <?php include 'View/includes/navbar.php' ?>
    <main class="main-container">
        <div class="container-card">
            <div class="header-card">
                <div class="text-container-header-card">
                    <p>Cadastro de Movimentação </p>
                </div>
            </div>
            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button class="btn btn-pet" data-bs-toggle="modal" data-bs-target="#modalMovimentacao">Nova Movimentação</button>
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
                                <th>Data</th>
                                <th>Valor Total</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model->rows as $movimentacao) : ?>
                                <tr>
                                    <td><?= $movimentacao->data ?></td>
                                    <td>R$ <?= $movimentacao->total ?></td>
                                    <td><?= $movimentacao->descricao ?></td>
                                    <td class="tipo-movimentacao <?= ($movimentacao->valor_total > 0) ? "movimentacao-entrada" : "movimentacao-saida" ?>">
                                        <?= ($movimentacao->valor_total > 0) ? "ENTRADA" : "SAÍDA" ?>
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
    <div class="modal fade modal-bootstrap" id="modalMovimentacao" tabindex="-1" role="dialog" aria-labelledby="modalMovimentacaoTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMovimentacaoTitle">Cadastrar Movimentacao</h5>
                </div>
                <form method="post" action="/movimentacao/save">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="input-row justify-content-start">
                            <div class="input-container">
                                <label for="descricao">Descrição:</label>
                                <input type="text" name="descricao" class="form-control" id="descricao" required maxlength="45"><br>
                            </div>

                        </div>
                        <div class="input-row d-flex justify-content-between">
                            <div class="input-container">
                                <label for="data_movimentacao">Data da Movimentacao:</label><br>
                                <input type="date" name="data_movimentacao" class="form-control" id="data_movimentacao" required><br>
                            </div>
                            <div class="input-container ">
                                <label for="valor">Valor:</label>
                                <input type="number" name="valor_total" class="form-control" id="valor_total" required><br>
                            </div>
                        </div>
                        <div class="input-container">
                            <label for="tipo">Tipo</label><br>
                            <select class="selectpicker" name="tipo" id="tipo">
                                <option value="ENTRADA">Entrada</option>
                                <option value="SAIDA">Saída</option>
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-pet" id="adicionarPet">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.pet.js"></script>
</body>

</html>