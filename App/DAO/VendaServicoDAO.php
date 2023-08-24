<?php
namespace App\DAO;

use App\Model\VendaServicoModel;
use \PDO;

class VendaServicoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(VendaServicoModel $model) 
    {
        $sql = "INSERT INTO Venda_Servico(id_venda, id_servico) VALUE (?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_venda);        
        $stmt->bindValue(2, $model->id_servico);       
      
        $stmt->execute();
    }

    public function update(VendaServicoModel $model) 
    {
        $sql = "UPDATE Venda_Servico SET id_venda = ?, id_servico = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_venda);        
        $stmt->bindValue(2, $model->id_servico);       
        $stmt->bindValue(3, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Venda  ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Venda WHERE id = ?  ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Venda WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}