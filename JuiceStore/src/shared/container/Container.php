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
        return function () {
            return new ItemManager(
                new ItemRepository($this->make("pdo"))
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


    public function make($name)
    {
        if (!empty($this->instances[$name])) {
            return $this->instances[$name];
        }

        if (isset($this->factories[$name])) {
            $this->instances[$name] = $this->factories[$name]();
        }

        return $this->instances[$name];
    }

}


