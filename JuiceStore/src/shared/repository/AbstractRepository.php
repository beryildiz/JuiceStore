<?php

namespace app\shared\repository;

use PDO;

abstract class AbstractRepository
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    protected abstract function getTableName();

    protected abstract function getEntityName();

    public function getAll()
    {

        $table = $this->getTableName();
        $model = $this->getEntityName();
        $statement = $this->pdo->query("select * from `$table`");
        return $statement->fetchAll(PDO::FETCH_CLASS, $model);
    }

    public function findById($id)
    {
        $table = $this->getTableName();
        $model = $this->getEntityName();
        $statement = $this->pdo->prepare("select * from `$table` where id = ?");
        $statement->execute([$id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        return $statement->fetch(PDO::FETCH_CLASS);
    }


}