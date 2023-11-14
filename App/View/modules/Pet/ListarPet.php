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
                    <p>Cadastro de Pets </p>
                </div>
            </div>
            <div class="main-card">
                <div class="containers-card buttons-container">
                    <button class="btn btn-pet" data-bs-toggle="modal" data-bs-target="#modalPet">Novo Pet</button>
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
                                <th>Nome</th>
                                <th>Raça</th>
                                <th>Cliente</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model->rows as $pet) : ?>
                                <tr>
                                    <td><?= $pet->nome ?></td>
                                    <td><?= $pet->raca ?></td>
                                    <td><?= $pet->cliente ?></td>
                                    <td class="actions-list">
                                        <box-icon name="edit" color="blue" id="<?= $pet->id ?>" data-bs-toggle="modal" data-bs-target="#modalPet" class="btn-icon btn-edit"></box-icon>
                                        <box-icon name="trash" color="red" id="<?= $pet->id ?>" class="btn-icon btn-delete"></box-icon>
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
    <div class="modal fade modal-bootstrap" id="modalPet" tabindex="-1" role="dialog" aria-labelledby="modalPetTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPetTitle">Cadastrar Pet</h5>                    
                </div>
                <form method="post" action="/pet/save">
                    <div class="modal-body">
                        <div class="input-row">
                            <div class="input-container mb-3">
                                <input type="hidden" name="id" id="id">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control" id="nome" required maxlength="45">
                            </div>
                            <div class="input-container mb-3">                                
                                <label for="raca">Raça:</label>
                                <input type="text" name="raca" class="form-control" id="raca" required maxlength="45">
                            </div>
                        </div>
                        <div class="input-row">
                            <label for="id_cliente">cliente:</label><br>
                            <select class="select-2" name="id_cliente" id="id_cliente" required>
                                <?php if ($model->lista_clientes == null) : ?>
                                    <option value="">Cadastre uma cliente primeiro!</option>
                                <?php else : ?>
                                    <option value="">Selecione uma cliente!</option>
                                    <?php foreach ($model->lista_clientes as $cliente) : ?>
                                        <option value=<?= $cliente->id ?>><?= $cliente->nome ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
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