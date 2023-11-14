<?php

use App\Controller\{
    CategoriaController,
    ClienteController,
    LoginController,
    DashboardController,
    ItemController,
    MovimentacaoController,
    PetController,
    ProdutoController,
    VendaController
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

        // pet
    case '/pet':
        PetController::index();
        break;
    case '/pet/delete':
        PetController::delete();
        break;
    case '/pet/save':
        PetController::save();
        break;
    case '/pet/get-by-id':
        PetController::getById();
        break;

        // produto
    case '/produto':
        ProdutoController::index();
        break;
    case '/produto/delete':
        ProdutoController::delete();
        break;
    case '/produto/save':
        ProdutoController::save();
        break;
    case '/produto/get-by-id':
        ProdutoController::getById();
        break;
    case '/editar_produto':
        ProdutoController::edit();
        break;

        // venda
    case '/venda':
        VendaController::index();
        break;
        // relatorio
    case '/relatorio':
        VendaController::relatorio();
        break;
    case '/venda/delete':
        VendaController::delete();
        break;
    case '/venda/save':
        VendaController::save();
        break;
    case '/venda/get-produtos':
        ItemController::getProdutos();
        break;

    case '/venda/get-by-id':
        VendaController::getById();
        break;

        // Movimentacao
    case '/movimentacao':
        MovimentacaoController::index();
        break;
    case '/movimentacao/delete':
        MovimentacaoController::delete();
        break;
    case '/movimentacao/save':
        MovimentacaoController::save();
        break;
    case '/movimentacao/get-by-id':
        MovimentacaoController::getById();
        break;


        // item
    case '/item':
        ItemController::index();
        break;
    case '/item/delete':
        ItemController::delete();
        break;
    case '/item/save':
        ItemController::save();
        break;
    case '/item/get-by-id':
        ItemController::getById();
        break;

    default:
        header("Location: /login");
        break;
}
