<?php
namespace App\DAO;

use App\Model\ProdutoModel;
use \PDO;

class ProdutoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(ProdutoModel $model) 
    {
        $sql = "INSERT INTO Produto(descricao, preco, id_categoria) VALUE (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);        
        $stmt->bindValue(2, $model->preco);        
        $stmt->bindValue(3, $model->id_categoria);        

        $stmt->execute();
    }

    public function update(ProdutoModel $model) 
    {
        $sql = "UPDATE Produto SET descricao = ?, preco = ?, id_categoria = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);        
        $stmt->bindValue(2, $model->preco);        
        $stmt->bindValue(3, $model->id_categoria);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT p.*, c.descricao as categoria 
        FROM Produto p
        JOIN Categoria c ON c.id = p.id_categoria 
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

  
    public function selectById($id) 
    {
        $sql = "SELECT p.*, c.descricao as categoria 
        FROM Produto p
        JOIN Categoria c ON c.id = p.id_categoria
        WHERE p.id = ? 
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}