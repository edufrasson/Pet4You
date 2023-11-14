<?php
namespace App\DAO;

use App\Model\ClienteModel;
use \PDO;

class ClienteDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(ClienteModel $model) 
    {
        $sql = "INSERT INTO Cliente(nome, cpf, data_nasc) VALUE (?, ?, ?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->nome);        
        $stmt->bindValue(2, $model->cpf);        
        $stmt->bindValue(3, $model->data_nasc);        

        $stmt->execute();
    }

    public function update(ClienteModel $model) 
    {
        $sql = "UPDATE Cliente SET nome = ?, cpf = ?, data_nasc = ? WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->nome);        
        $stmt->bindValue(2, $model->cpf);        
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Cliente  ";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Cliente WHERE id = ?  ";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Cliente WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}