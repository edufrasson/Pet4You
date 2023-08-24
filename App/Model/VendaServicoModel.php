<?php
namespace App\Model;

use App\DAO\VendaServicoDAO;

class VendaServicoModel extends Model {
	public $id, $id_venda, $id_servico;

	public function save()
    {
        $dao = new VendaServicoDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new VendaServicoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new VendaServicoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CategoriaModel();
    }
  
    public function delete(int $id)
    {
        $dao = new VendaServicoDAO();

        $dao->delete($id);
    }
}
