<?php
namespace App\Controller;

use App\Model\ProdutoModel;

class ProdutoController extends Controller {
	public static function index()
    {
        parent::isAuthenticated();

        $model = new ProdutoModel();
        $model->getAllRows();

        include 'View/modules/Produto/ListarProduto.php';
    }

    public static function getAll(){
        parent::isAuthenticated();

        $model = new ProdutoModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new ProdutoModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new ProdutoModel();

        $model->id = $_POST['id'];
		$model->descricao = $_POST['descricao'];
		$model->preco = $_POST['preco'];
		$model->id_categoria = $_POST['id_categoria'];
            
        $model->save();

        parent::setResponseAsJSON($model);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}