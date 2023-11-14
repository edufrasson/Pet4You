<?php
namespace App\DAO;

use App\Model\MovimentacaoModel;
use \PDO;

class MovimentacaoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(MovimentacaoModel $model) 
    {
        $sql = "INSERT INTO Movimentacao(valor_total, data_movimentacao, id_venda) VALUE (?, ?, ?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->valor_total);        
        $stmt->bindValue(2, $model->data_movimentacao);        
        $stmt->bindValue(3, $model->id_venda);        

        $stmt->execute();
    }

    public function update(MovimentacaoModel $model) 
    {
        $sql = "UPDATE Movimentacao SET valor_total = ?, data_movimentacao = ?, id_venda = ? WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->valor_total);        
        $stmt->bindValue(2, $model->data_movimentacao);        
        $stmt->bindValue(3, $model->id_venda);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT * FROM Movimentacao  ";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Movimentacao WHERE id = ?  ";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Movimentacao WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}