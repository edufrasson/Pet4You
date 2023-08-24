<?php
namespace App\Model;

use App\DAO\ParcelaDAO;

class ParcelaModel extends Model {
	public $id, $indice, $data_parcela, $valor_parcela, $id_pagamento;

	public function save()
    {
        $dao = new ParcelaDAO();
        
       if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new ParcelaDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ParcelaDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ParcelaModel();
    }
  
    public function delete(int $id)
    {
        $dao = new ParcelaDAO();

        $dao->delete($id);
    }
}
