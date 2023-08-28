<?php
namespace App\DAO;

use App\Model\CategoriaModel;
use \PDO;

class CategoriaDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(CategoriaModel $model) 
    {
        $sql = "INSERT INTO Categoria (descricao) VALUE (?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);        

        $stmt->execute();
    }

    public function update(CategoriaModel $model) 
    {
        $sql = "UPDATE Categoria SET descricao = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);        
        $stmt->bindValue(2, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Categoria ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Categoria WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Categoria WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}