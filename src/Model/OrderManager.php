<?php

namespace App\Model;

use PDO;

class OrderManager extends AbstractManager
{
    public const TABLE = '`order`';

    /**
     * Insert new item in database
     */
    public function insert(array $shoppingCart): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`,`image`,`price`) VALUES (:name,:image,:price)");
        $statement->bindValue('name', $shoppingCart[1], PDO::PARAM_STR);
        $statement->bindValue('image', $shoppingCart[2], PDO::PARAM_STR);
        $statement->bindValue('price', $shoppingCart[0], PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
