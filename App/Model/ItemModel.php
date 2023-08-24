<?php
namespace App\Model;

use App\DAO\ItemDAO;

class ItemModel extends Model {
	public $id_produto, $id_venda, $quantidade, $valor_unit;

	public function save()
    {
        $dao = new ItemDAO();
        
       /* if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);*/
        
    }

    public function getAllRows()
    {
        $dao = new ItemDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ItemDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ItemModel();
    }
  
    public function delete(int $id)
    {
        $dao = new ItemDAO();

        $dao->delete($id);
    }
}
