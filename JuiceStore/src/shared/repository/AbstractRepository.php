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

    protected abstract function getControllerName();

    protected function getAll()
    {
        $table = $this->getTableName();
        $controller = $this->getControllerName();
        $statement = $this->pdo->query("select * from `$table`");
        return $statement->fetchAll(PDO::FETCH_CLASS, $controller);
    }

    protected function findById($id)
    {
        $table = $this->getTableName();
        $controller = $this->getControllerName();
        $statement = $this->pdo->prepare("select * from `$table` where id = ?");
        $statement->execute([$id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, $controller);
        return $statement->fetch(PDO::FETCH_CLASS);
    }


}