<?php
namespace App\Controller;

use App\Model\VendaServicoModel;

class VendaServicoController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new VendaServicoModel();
        $model->getAllRows();

        include 'View/modules/VendaServico/ListarVendaServico.php';
	}

	public static function getAll(){
        parent::isAuthenticated();

        $model = new VendaServicoModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new VendaServicoModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new VendaServicoModel();

        $model->id = $_POST['id'];
		$model->id_venda = $_POST['id_venda'];
		$model->id_servico = $_POST['id_servico'];
        
        $model->save();

        parent::setResponseAsJSON($model);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new VendaServicoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
