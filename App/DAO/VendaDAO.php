<?php
namespace App\DAO;

use App\Model\VendaModel;
use \PDO;

class VendaDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(VendaModel $model) 
    {
        $sql = "INSERT INTO Venda(data_venda, id_cliente) VALUE (?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);        
        $stmt->bindValue(2, $model->id_cliente);       
      
        $stmt->execute();
    }

    public function update(VendaModel $model) 
    {
        $sql = "UPDATE Venda SET data_venda = ?, id_cliente = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);        
        $stmt->bindValue(2, $model->id_cliente);       
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