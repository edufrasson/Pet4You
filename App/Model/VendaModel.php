<?php
namespace App\Model;

use App\DAO\VendaDAO;

class VendaModel extends Model {
	public $id, $data_venda, $id_cliente;

	public function save()
    {
        $dao = new VendaDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new VendaDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new VendaDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CategoriaModel();
    }
  
    public function delete(int $id)
    {
        $dao = new VendaDAO();

        $dao->delete($id);
    }
}
