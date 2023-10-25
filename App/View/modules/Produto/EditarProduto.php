<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App/View/modules/Movimentacao/edit.css">

    <?php include 'App/View/includes/css_config.php' ?>
    <title>Pet4You - Editar Produto</title>
</head>

<body>
    <?php include 'App/View/includes/navbar.php' ?>

    <div class="main-container">
        <div class="container-card">
            <div class="header-card">
                <div class="text-container-header-card">
                    <p>Editar Produto</p>
                </div>

            </div>
            <div class="main-card">
                <div class="form-edit-container">
                    <form class="form form-edit" action="/produto/save" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $dados->id ?>">
                        <div class="mb-3 d-flex justify-content-around">
                            <div class="input-container">
                                <label for="descricao">Descrição:</label>
                                <input type="text" name="descricao" value="<?= $dados->descricao ?>" class="form-control" id="descricao" required maxlength="90">
                            </div>

                            <div class="input-container">
                                <label for="preco">Preço:</label><br>
                                <input class="form-control" value="<?= abs($dados->preco) ?>" type="number" min="0" name="valor" id="valor">
                            </div>
                        </div>
                        
                        <div class="mb-3 d-flex justify-content-around">
                            <div class="input-container">
                                <label for="id-casa">categoria:</label><br>
                                <select class="selectpicker" data-style="border border-secondary" data-live-search="true" name="id_categoria" id="id_categoria">
                                    <?php if ($model->lista_categoria == null) : ?>
                                        <option class="option-categoria" value="">Cadastre uma categoria primeiro!</option>
                                    <?php else : ?>
                                        <?php foreach ($model->lista_categoria as $categoria) :
                                            $selected = ($categoria->id == $dados->id_categoria) ? "selected" : "";
                                        ?>
                                            <option <?= $selected ?>class="option-categoria" value=<?= $categoria->id ?>><?= $categoria->descricao ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="m-5 button-container d-flex justify-content-center">
                            <button class="btn btn-success" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>


    <?php include 'App/View/includes/js_config.php' ?>
    <script src="App/View/js/src/jquery.produto.js"></script>
</body>

</html>