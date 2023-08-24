<?php
namespace App\Controller;

use App\Model\ParcelaModel;

class ParcelaController extends Controller {
	public static function index() 
	{
		parent::isAuthenticated();

        $model = new ParcelaModel();
        $model->getAllRows();

        include 'View/modules/Parcela/ListarParcela.php';
	}

	public static function getAll(){
        parent::isAuthenticated();

        $model = new ParcelaModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {   
        parent::isAuthenticated();
        
        $model = new ParcelaModel();
        $data = $model->getById($_GET['id']);

        parent::setResponseAsJSON($data);
    }

    public static function save()
    {   
        parent::isAuthenticated();
     
        $model = new ParcelaModel();

        $model->id = $_POST['id'];
		$model->id_pagamento = $_POST['id_pagamento'];
		$model->data_parcela = $_POST['data_parcela'];
		$model->valor_parcela = $_POST['valor_parcela'];
		$model->indice = $_POST['indice'];
            
        $model->save();

        parent::setResponseAsJSON($model);
    }

    public static function delete()
    {   
        parent::isAuthenticated();
     
        $model = new ParcelaModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}
