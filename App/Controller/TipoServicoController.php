<?php
namespace App\Controller;

use App\Model\TipoServicoModel;

class TipoServicoController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new TipoServicoModel();
        $model->getAllRows();

        include 'View/modules/TipoServico/ListarTipoServico.php';
	}

	public static function getAll(){
        parent::isAuthenticated();

        $model = new TipoServicoModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new TipoServicoModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new TipoServicoModel();

        $model->id = $_POST['id'];
		$model->descricao = $_POST['descricao'];
		$model->valor = $_POST['valor'];
	
            
        $model->save();

        parent::setResponseAsJSON($model);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new TipoServicoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
