<?php
namespace App\DAO;

use App\Model\PagamentoModel;
use \PDO;

class PagamentoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(PagamentoModel $model) 
    {
        $sql = "INSERT INTO Pagamento(id_venda, qnt_parcelas, valor_total, tipo) VALUE (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_venda);        
        $stmt->bindValue(2, $model->qnt_parcelas);        
        $stmt->bindValue(3, $model->valor_total);        
        $stmt->bindValue(4, $model->tipo);        

        $stmt->execute();
    }

    public function update(PagamentoModel $model) 
    {
        $sql = "UPDATE Pagamento SET id_venda = ?, qnt_parcelas = ?, valor_total = ?, tipo = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_venda);        
        $stmt->bindValue(2, $model->qnt_parcelas);        
        $stmt->bindValue(3, $model->valor_total);
        $stmt->bindValue(4, $model->tipo);        
        $stmt->bindValue(5, $model->id);        

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Pagamento  ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Pagamento WHERE id = ?  ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Pagamento WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}