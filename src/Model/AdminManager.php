<?php

namespace App\Model;

use App\Model\AbstractManager;

class AdminManager extends AbstractManager
{
    public const TABLE = 'admin';

    public function selectOneByEmail(string $email): array |false
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE email=:email");
        $statement->bindValue('email', $email, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }
}
