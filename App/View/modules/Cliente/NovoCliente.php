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
                    <button class="btn btn-pet">Novo Cliente</button>
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
                        <tbody >
                         
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
    
    <?php include 'View/includes/js_config.php' ?>
</body>

</html>