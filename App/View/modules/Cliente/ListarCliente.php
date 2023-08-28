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
                    <p>Cadastro de Clientes</p>
                </div>
            </div>
            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button class="btn btn-pet" data-bs-toggle="modal" data-bs-target="#modalCliente">Novo Cliente</button>
                </div>
                <div class="containers-card table-container">
                    <table class="table-style table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Data de Nascimento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($model->rows as $cliente): ?>
                                <tr>
                                    <td><?= $cliente->nome?></td>
                                    <td><?= $cliente->cpf?></td>
                                    <td><?= $cliente->data_nasc?></td>
                                </tr>
                            <?php endforeach;?>
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
    <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalClienteTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalClienteTitle">Cadastrar Cliente</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post" action="/cliente/save">
                    <div class="modal-body">
                        <div class="input-container">
                            <input type="hidden" name="id" id="id">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" id="nome" required maxlength="90">
                        </div>
                        <div class="input-container">
                            <label for="cpf">CPF:</label>
                            <input type="text" data-mask="000.000.000-00" name="cpf" class="form-control" id="cpf" required>
                        </div>
                        <div class="input-container">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" required>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-pet" id="adicionarTipo">Salvar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'View/includes/js_config.php' ?>
</body>

</html>