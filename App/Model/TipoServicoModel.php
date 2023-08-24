<?php
namespace App\Model;

use App\DAO\TipoServicoDAO;

class TipoServicoModel extends Model {
	public $id, $descricao, $valor;

	public function save()
    {
        $dao = new TipoServicoDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new TipoServicoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new TipoServicoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new TipoServicoModel();
    }
  
    public function delete(int $id)
    {
        $dao = new TipoServicoDAO();

        $dao->delete($id);
    }
}