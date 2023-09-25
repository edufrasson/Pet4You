<?php
namespace App\Controller;

use App\Model\CategoriaModel;

class CategoriaController extends Controller {
	public static function index()
    {
        parent::isAuthenticated();

        $model = new CategoriaModel();
        $model->getAllRows();

        include 'View/modules/Categoria/ListarCategoria.php';
    }

    public static function getAll(){
        parent::isAuthenticated();

        $model = new CategoriaModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new CategoriaModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new CategoriaModel();

        $model->id = $_POST['id'];
		$model->descricao = $_POST['descricao'];
            
        $model->save();

        header("Location: /categoria");
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new CategoriaModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}