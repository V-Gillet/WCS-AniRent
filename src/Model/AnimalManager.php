<?php

namespace App\Model;

class AnimalManager extends AbstractManager
{
    public const TABLE = 'animal';

    public function selectAllAnimal()
    {
        $query = 'SELECT * FROM ' . self::TABLE;

        return $this->pdo->query($query)->fetchAll();
    }
}
