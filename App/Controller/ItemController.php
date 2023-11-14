<?php
namespace App\Controller;

use App\Model\ItemModel;

class ItemController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new ItemModel();
        $model->getAllRows();

        include 'View/modules/Item/ListarItem.php';
	}

	public static function getAll(){
        parent::isAuthenticated();

        $model = new ItemModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new ItemModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();  
        $lista = json_decode($_POST['lista_produtos']);
        $model = new ItemModel();        
		$model->id_venda = $_POST['id_venda'];		
        $model->arr_produtos = $lista;
        $res = $model->save();
        

        parent::setResponseAsJSON($res);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new ItemModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
