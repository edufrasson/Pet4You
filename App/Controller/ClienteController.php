<?php
namespace App\Controller;

use App\Model\ClienteModel;
use App\Services\Service;

class ClienteController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new ClienteModel();
        $model->getAllRows();

        include 'View/modules/Cliente/ListarCliente.php';
	}

	public static function getAll(){
        parent::isAuthenticated();

        $model = new ClienteModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new ClienteModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new ClienteModel();

        $model->id = $_POST['id'];
		$model->nome = $_POST['nome'];
		$model->cpf = Service::unmaskCPF($_POST['cpf']);
		$model->data_nasc = $_POST['data_nasc'];
            
        $model->save();

       header("Location: /cliente");
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new ClienteModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
