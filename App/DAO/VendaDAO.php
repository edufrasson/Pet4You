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
        $sql = "INSERT INTO Venda(data_venda, id_pet) VALUE (?, ?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);        
        $stmt->bindValue(2, $model->id_pet);       
      
        $stmt->execute();

        $model_retorno = new VendaModel();
        $model_retorno->id = parent::getConnection()->lastInsertId();
        return $model_retorno;
    }

    public function update(VendaModel $model) 
    {
        $sql = "UPDATE Venda SET data_venda = ?, id_pet = ? WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);        
        $stmt->bindValue(2, $model->id_pet);       
        $stmt->bindValue(3, $model->id);

        $stmt->execute();
    }

    public function select() 
    {
        $sql = "SELECT v.*,
		                p.nome as nome_pet,
                        c.nome as nome_cliente,
                        DATE_FORMAT(v.data_venda, '%d/%m/%Y') as data,
                        FORMAT(m.valor_total, 2, 'de_DE')  as valor_total
                FROM venda v
                JOIN pet p ON p.id = v.id_pet
                JOIN cliente c ON c.id = p.id_cliente
                JOIN movimentacao m ON v.id = m.id_venda
                ;  ";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id) 
    {
        $sql = "SELECT * FROM Venda WHERE id = ?  ";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM Venda WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}