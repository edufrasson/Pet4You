<?php
namespace App\Controller;

use App\Model\ServicoModel;

class ServicoController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new ServicoModel();
        $model->getAllRows();

        include 'View/modules/Servico/ListarServico.php';
	}

	public static function getAll(){
        parent::isAuthenticated();

        $model = new ServicoModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new ServicoModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new ServicoModel();

        $model->id = $_POST['id'];
		$model->data_servico = $_POST['data_servico'];
		$model->id_pet = $_POST['id_pet'];
		$model->id_tipo = $_POST['id_tipo'];
            
        $model->save();

        parent::setResponseAsJSON($model);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new ServicoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
