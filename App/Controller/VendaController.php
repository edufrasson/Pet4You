<?php
namespace App\Controller;

use App\Model\VendaModel;

class VendaController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new VendaModel();
        $model->getAllRows();
        $model->getAllProdutos();
        $model->getAllPets();

        include 'View/modules/Venda/NovaVenda.php';
	}

    public static function relatorio(){
        $model = new VendaModel();
        $model->getAllRows();

        include 'View/modules/Venda/VerRelatorio.php';
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
		$model->id_pet = $_POST['id_pet'];

        parent::setResponseAsJSON($model->save());
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new VendaModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
