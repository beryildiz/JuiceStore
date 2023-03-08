<?php

namespace app\shared\container;


use app\item\control\ItemManager;
use app\item\gateway\ItemRepository;
use PDO;
use PDOException;


class Container
{
    protected $factories = [];
    private $instances = [];

    public function __construct()
    {
        $this->factories = [
            'itemManager' => $this->createItemManager(),
            'pdo' => $this->createPdo(),
        ];
    }

    private function createItemManager()
    {
        return function (PDO $pdo) {
            return new ItemManager(
                new ItemRepository($pdo)
            );
        };
    }

    private function createPdo()
    {
        return function () {
            try {
                $pdo = new PDO(
                    'mysql:host=localhost;dbname=juicestore;charset=utf8',
                    'root',
                    ''
                );
            } catch (PDOException $e) {
                echo "Connection to database failed";
                die();
            }
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
        };
    }


    public function get($name)
    {
        if (!empty($this->instances[$name])) {
            return $this->instances[$name];
        }

        if (isset($this->receipts[$name])) {
            $this->instances[$name] = $this->receipts[$name]($this->get('pdo'));
        }

        return $this->instances[$name];
    }

}

