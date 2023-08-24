<?php
namespace App\Model;

use App\DAO\ServicoDAO;

class ServicoModel extends Model {
	public $id, $data_servico, $id_pet, $id_tipo;

	public function save()
    {
        $dao = new ServicoDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new ServicoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ServicoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ServicoModel();
    }
  
    public function delete(int $id)
    {
        $dao = new ServicoDAO();

        $dao->delete($id);
    }
}
