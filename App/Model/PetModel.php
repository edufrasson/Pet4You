<?php
namespace App\Model;

use App\DAO\ClienteDAO;
use App\DAO\PetDAO;

class PetModel extends Model {
	public $id, $nome, $raca, $id_cliente;
    public $lista_clientes;

	public function save()
    {
        $dao = new PetDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new PetDAO();

        $this->rows = $dao->select();
    }

    public function getAllClientes(){
        $dao = new ClienteDAO();

        $this->lista_clientes = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new PetDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new PetModel();
    }
  
    public function delete(int $id)
    {
        $dao = new PetDAO();

        $dao->delete($id);
    }
}
