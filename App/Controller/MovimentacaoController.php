<?php
namespace App\Controller;

use App\Model\MovimentacaoModel;

class MovimentacaoController extends Controller {
	public static function index()
    {
        parent::isAuthenticated();

        $model = new MovimentacaoModel();
        $model->getAllRows();

        include 'View/modules/Movimentacao/ListarMovimentacao.php';
    }

    public static function getAll(){
        parent::isAuthenticated();

        $model = new MovimentacaoModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new MovimentacaoModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function edit(){
        $model = new MovimentacaoModel();
        $dados = $model->getById($_GET['id']);       

        include 'View/modules/Movimentacao/EditarMovimentacao.php';
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new MovimentacaoModel();

        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao'];
		$model->data_movimentacao = $_POST['data_movimentacao'];
        ($_POST['tipo'] == 'ENTRADA') ? $model->valor_total = $_POST['valor_total'] : $model->valor_total = -$_POST['valor_total'];
		
		if(isset($_POST['id_venda']))
            $model->id_venda = $_POST['id_venda'];
            
        $model->save();

        header("Location: /movimentacao");
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new MovimentacaoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}