<?php

namespace App\Model;

use PDO;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    /**
     * Insert new item in database
     */
    public function insert(array $customer): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`firstname`,`lastname`,`email`,`phone`,`adress`) VALUES (:firstname,:lastname,:email,:phone,:adress)");
        $statement->bindValue('firstname', $customer['firstname'], PDO::PARAM_STR);
        $statement->bindValue('lastname', $customer['lastname'], PDO::PARAM_STR);
        $statement->bindValue('email', $customer['mail'], PDO::PARAM_STR);
        $statement->bindValue('phone', $customer['phone'], PDO::PARAM_INT);
        $statement->bindValue('adress', $customer['adress'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     */
    public function update(array $item): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $item['id'], PDO::PARAM_INT);
        $statement->bindValue('title', $item['title'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
