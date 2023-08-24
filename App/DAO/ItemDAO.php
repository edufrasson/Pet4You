<?php
namespace App\DAO;

use App\Model\ItemModel;
use \PDO;

class ItemDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(ItemModel $model) 
    {
        $sql = "INSERT INTO Item(id_venda, id_produto, quantidade, valor_unit) VALUE (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_venda);        
        $stmt->bindValue(2, $model->id_produto);        
        $stmt->bindValue(3, $model->quantidade);        
        $stmt->bindValue(4, $model->valor_unit);        

        $stmt->execute();
    }

    public function update(ItemModel $model) 
    {
        $sql = "UPDATE Item SET id_venda = ?, id_produto = ?, quantidade = ?, valor_unit = ? WHERE id_venda = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_venda);        
        $stmt->bindValue(2, $model->id_produto);        
        $stmt->bindValue(3, $model->quantidade);
        $stmt->bindValue(4, $model->valor_unit);        
        $stmt->bindValue(5, $model->id_venda);   
     

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Item  ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id_venda) 
    {
        $sql = "SELECT * FROM Item WHERE id_venda = ?  ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_venda);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id_venda) 
    {
        $sql = "DELETE FROM Item WHERE id_venda = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_venda);

        $stmt->execute();       
    }
}