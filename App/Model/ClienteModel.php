<?php
namespace App\Model;

use App\DAO\ClienteDAO;

class ClienteModel extends Model {
	public $id, $nome, $cpf, $data_nasc;

	public function save()
    {
        $dao = new ClienteDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new ClienteDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ClienteDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ClienteModel();
    }
  
    public function delete(int $id)
    {
        $dao = new ClienteDAO();

        $dao->delete($id);
    }
}
