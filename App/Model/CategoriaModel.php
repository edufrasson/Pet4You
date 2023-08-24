<?php
namespace App\Model;

use App\DAO\CategoriaDAO;

class CategoriaModel extends Model {
	public $id, $descricao;

	public function save()
    {
        $dao = new CategoriaDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new CategoriaDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new CategoriaDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CategoriaModel();
    }
  
    public function delete(int $id)
    {
        $dao = new CategoriaDAO();

        $dao->delete($id);
    }
}