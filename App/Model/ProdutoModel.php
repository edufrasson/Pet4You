<?php
namespace App\Model;

use App\DAO\CategoriaDAO;
use App\DAO\ProdutoDAO;

class ProdutoModel extends Model {
	public $id, $descricao, $preco, $id_categoria;
    public $lista_categorias;

	public function save()
    {
        $dao = new ProdutoDAO();
        
        if(empty($this->id))
        {
            return $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new ProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getAllCategorias(){
        $dao = new CategoriaDAO();

        $this->lista_categorias = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ProdutoModel();
    }
  
    public function delete(int $id)
    {
        $dao = new ProdutoDAO();

        $dao->delete($id);
    }
}
