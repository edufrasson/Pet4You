<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'View/includes/css_config.php' ?>
    <link rel="stylesheet" href="View/modules/Venda/venda.css">
    <title>Relatório de Vendas</title>
</head>

<body>
    <?php include 'View/includes/navbar.php' ?>

    <div class="main-container">
        <div class="container-card">
            <div class="header-card">
                <div class="text-container-header-card">
                    <p>Relatório de Vendas</p>
                </div>                
            </div>
            <div class="main-card">
                <div class="containers-card">
                    <div class="container-table">
                        <div class="loading-container d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <table id="tableVenda" class="table  table-style off">
                            <thead>
                                <tr>
                                    <th>Data da Venda</th>
                                    <th>Valor Total</th>
                                    <th>Cliente</th>
                                    <th>Pet </th>
                                    <th>Ver Produtos</th>                                    
                                </tr>

                            </thead>
                            <tbody>
                                <?php if ($model->rows !== null) : ?>
                                    <?php foreach ($model->rows as $venda) : ?>
                                        <tr>
                                            <td><?= $venda->data ?></td>
                                            <td>R$ <?= $venda->valor_total ?></td>
                                            <td><?= $venda->nome_cliente ?></td>
                                            <td><?= $venda->nome_pet ?></td>
                                            <td><button id="<?= $venda->id ?>" class="btn btn-pet open-produtos" data-bs-toggle="modal" data-bs-target="#modalProdutos">Produtos</button></td>
                                            
                                            
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    Nenhum registro.
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="containers-card action-table-container">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Produtos  -->
    <div class="modal fade" id="modalProdutos" tabindex="-1" role="dialog" aria-labelledby="modalProdutosTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProdutosTitle">Lista de Produtos na Venda</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="table-container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Valor Unitário</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody id="tableProdutos">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Detalhes  -->
    <div class="modal fade" id="modalDetalhes" tabindex="-1" role="dialog" aria-labelledby="modalDetalhesTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetalhesTitle">Lista de Detalhes da Venda</h5>
                   
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="table-container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Índice</th>
                                        <th>Valor (R$)</th>
                                        <th>Data da Parcela</th>
                                        <th>Recebimento</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="tableParcelas">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'View/includes/js_config.php' ?>
    <script src="View/js/src/jquery.relatorio.js"></script>


</body>

</html>