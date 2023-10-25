<?php
namespace App\Controller;

use App\Model\PetModel;

class PetController extends Controller {
	public static function index()
    {
        parent::isAuthenticated();

        $model = new PetModel();
        $model->getAllRows();
        $model->getAllClientes();

        include 'View/modules/Pet/ListarPet.php';
    }

    public static function getAll(){
        parent::isAuthenticated();

        $model = new PetModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new PetModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new PetModel();

        $model->id = $_POST['id'];
		$model->nome = $_POST['nome'];
		$model->raca = $_POST['raca'];
		$model->id_cliente = $_POST['id_cliente'];
            
        $model->save();

        parent::setResponseAsJSON($model);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new PetModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}