<?php
namespace App\Model;

use App\DAO\MovimentacaoDAO;

class MovimentacaoModel extends Model {
	public $id, $data_movimentacao, $valor_total, $id_venda, $descricao;
    public $lista_categorias;

	public function save()
    {
        $dao = new MovimentacaoDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new MovimentacaoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new MovimentacaoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new MovimentacaoModel();
    }
  
    public function delete(int $id)
    {
        $dao = new MovimentacaoDAO();

        $dao->delete($id);
    }
}
