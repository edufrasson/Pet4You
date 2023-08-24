<?php
namespace App\DAO;

use App\Model\ServicoModel;
use \PDO;

class ServicoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(ServicoModel $model) 
    {
        $sql = "INSERT INTO Servico(data_servico, id_pet, id_tipo) VALUE (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->data_servico);        
        $stmt->bindValue(2, $model->id_pet);        
        $stmt->bindValue(3, $model->id_tipo);        

        $stmt->execute();
    }

    public function update(ServicoModel $model) 
    {
        $sql = "UPDATE Servico SET data_servico = ?, id_pet = ?, id_tipo = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->data_servico);        
        $stmt->bindValue(2, $model->id_pet);        
        $stmt->bindValue(3, $model->id_tipo);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Servico  ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }   

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Servico WHERE id = ?  ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Servico WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}