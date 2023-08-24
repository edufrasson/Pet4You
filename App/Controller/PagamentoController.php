<?php
namespace App\Controller;

use App\Model\PagamentoModel;

class PagamentoController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new PagamentoModel();
        $model->getAllRows();

        include 'View/modules/Pagamento/ListarPagamento.php';
	}

	public static function getAll(){
        parent::isAuthenticated();

        $model = new PagamentoModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new PagamentoModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new PagamentoModel();

        $model->id = $_POST['id'];
		$model->id_venda = $_POST['id_venda'];
		$model->qnt_parcelas = $_POST['qnt_parcelas'];
		$model->valor_total = $_POST['valor_total'];
            
        $model->save();

        parent::setResponseAsJSON($model);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new PagamentoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
