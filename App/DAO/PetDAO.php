<?php
namespace App\DAO;

use App\Model\PetModel;
use \PDO;

class PetDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(PetModel $model) 
    {
        $sql = "INSERT INTO Pet(nome, raca, id_cliente) VALUE (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);        
        $stmt->bindValue(2, $model->raca);        
        $stmt->bindValue(3, $model->id_cliente);        

        $stmt->execute();
    }

    public function update(PetModel $model) 
    {
        $sql = "UPDATE Pet SET nome = ?, raca = ?, id_cliente = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);        
        $stmt->bindValue(2, $model->raca);        
        $stmt->bindValue(3, $model->id_cliente);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT p.*,
                        c.nome as cliente
                FROM Pet p
                JOIN Cliente c ON c.id = p.id_cliente 
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

  
    public function selectById($id) 
    {
        $sql = "SELECT * FROM Pet WHERE id = ?  ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Pet WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}