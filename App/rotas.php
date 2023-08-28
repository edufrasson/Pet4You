<?php

use App\Controller\{
    CategoriaController,
    ClienteController,
    LoginController,
    DashboardController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($parse_uri) {
        // Usuario
    case '/login':
        LoginController::form();
        break;
    case '/login/auth':
        LoginController::auth();
        break;
    case '/usuario':
        LoginController::index();
        break;
    case '/usuario/save':
        LoginController::save();
        break;
    case '/usuario/get-by-id':
        LoginController::getById();
        break;

    case '/home':
        DashboardController::index();
        break;
        // Cliente

    case '/cliente':
        ClienteController::index();
        break;
    case '/cliente/save':
        ClienteController::save();
        break;

        // Categoria
    case '/categoria':
        CategoriaController::index();
        break; 
    case '/categoria/delete':
        CategoriaController::delete();
        break;
    case '/categoria/save':
        CategoriaController::save();
        break;
    case '/categoria/get-by-id':
        CategoriaController::getById();
        break;

    default:
        header("Location: /login");
        break;
}
