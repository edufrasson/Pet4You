<?php
use App\Controller\{
    ClienteController,
    WelcomeController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    
    case '/cliente':
        ClienteController::index();
    break;
    case '/cliente/save':
        ClienteController::save();
        break;

    default:
        header("Location: /cliente");
    break;
}