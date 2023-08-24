<?php
namespace App\DAO;

use App\Model\ParcelaModel;
use \PDO;

class ParcelaDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(ParcelaModel $model) 
    {
        $sql = "INSERT INTO Parcela(id_pagamento, data_parcela, valor_parcela, indice) VALUE (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_pagamento);        
        $stmt->bindValue(2, $model->data_parcela);        
        $stmt->bindValue(3, $model->valor_parcela);        
        $stmt->bindValue(4, $model->indice);        

        $stmt->execute();
    }

    public function update(ParcelaModel $model) 
    {
        $sql = "UPDATE Parcela SET id_pagamento = ?, data_parcela = ?, valor_parcela = ?, indice = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_pagamento);        
        $stmt->bindValue(2, $model->data_parcela);        
        $stmt->bindValue(3, $model->valor_parcela);
        $stmt->bindValue(4, $model->indice);        
        $stmt->bindValue(5, $model->id);        

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Parcela  ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Parcela WHERE id = ?  ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Parcela WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}