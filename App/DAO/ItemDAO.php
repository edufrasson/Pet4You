<?php

namespace App\DAO;

use App\Model\ItemModel;
use \PDO;

class ItemDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(ItemModel $model)
    {



        parent::getConnection()->beginTransaction();

        foreach ($model->arr_produtos as $produto) {
            $sql = "INSERT INTO Item (quantidade, id_produto, id_venda, valor_unit) VALUE (?, ?, ?, ?)";

            $stmt = parent::getConnection()->prepare($sql);

            $stmt->bindValue(1, $produto->quantidade);
            $stmt->bindValue(2, $produto->id_produto);
            $stmt->bindValue(3, $model->id_venda);
            $stmt->bindValue(4, $produto->valor_unit);

            $stmt->execute();
        }

        return (parent::getConnection()->commit()) ? true : false;
    }

    public function update(ItemModel $model)
    {
        $sql = "UPDATE Item SET id_venda = ?, id_produto = ?, quantidade = ?, valor_unit = ? WHERE id_venda = ?";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->id_venda);
        $stmt->bindValue(2, $model->id_produto);
        $stmt->bindValue(3, $model->quantidade);
        $stmt->bindValue(4, $model->valor_unit);
        $stmt->bindValue(5, $model->id_venda);


        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Item  ";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id_venda)
    {
        $sql = "SELECT i.*,
                p.descricao as descricao
        FROM Item i
        JOIN Produto p ON p.id = i.id_produto
        WHERE id_venda = ?  ";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id_venda);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function delete($id_venda)
    {
        $sql = "DELETE FROM Item WHERE id_venda = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id_venda);

        $stmt->execute();
    }
}
