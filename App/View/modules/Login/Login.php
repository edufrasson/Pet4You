<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/modules/Login/login.css">
    <?php include 'View/includes/css_config.php' ?>
    <title>Login - Gestão Pet4You </title>
</head>

<body class="login-container">
    <main>
        <div class="container">
            <div class="text-container">Login</div>
            <div class="form-container">
                <form class="form" action="/login/auth" method="POST">
                    <div class="input-container">
                        <label>E-mail</label><br>
                        <input name="email" class="form-control" type="text" required>
                    </div>
                    <div class="input-container">
                        <label>Senha</label><br>
                        <input name="senha" class="form-control" type="password" required>
                    </div>
                    <button type="submit" class="btn btn-success">Entrar</button>
                </form>
            </div>
        </div>
    </main>

    <?php include 'View/includes/js_config.php' ?>
</body>

</html>