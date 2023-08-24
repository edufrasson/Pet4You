<?php
namespace App\Controller;

use App\Model\VendaModel;

class VendaController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new VendaModel();
        $model->getAllRows();

        include 'View/modules/Venda/ListarVenda.php';
	}

	public static function getAll(){
        parent::isAuthenticated();

        $model = new VendaModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new VendaModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new VendaModel();

        $model->id = $_POST['id'];
		$model->data_venda = $_POST['data_venda'];
		$model->id_cliente = $_POST['id_cliente'];
        
        $model->save();

        parent::setResponseAsJSON($model);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new VendaModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
