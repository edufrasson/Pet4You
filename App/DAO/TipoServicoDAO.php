<?php
namespace App\DAO;

use App\Model\TipoServicoModel;
use \PDO;

class TipoServicoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(TipoServicoModel $model) 
    {
        $sql = "INSERT INTO Tipo_Servico (descricao, valor) VALUE (?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);        
        $stmt->bindValue(2, $model->valor);        

        $stmt->execute();
    }

    public function update(TipoServicoModel $model) 
    {
        $sql = "UPDATE Tipo_Servico SET descricao = ?, valor = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);        
        $stmt->bindValue(2, $model->valor);    
        $stmt->bindValue(3, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Tipo_Servico WHERE ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Tipo_Servico WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Tipo_Servico WHERE id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}