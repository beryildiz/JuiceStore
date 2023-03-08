<?php

namespace app\shared;

use app\item\control\ItemManager;
use ItemRepository;
use PDO;
use PDOException;

class Container
{
    protected $container = [];
    private $instances = [];

    public function __construct()
    {
        $this->container = [
            "itemManager" => function () {
                return new ItemRepository(
                    $this->inject("pdo")
                );
            },
            'pdo' => function () {
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
            }
        ];
    }

    public function inject($name)
    {
        if (!empty($this->instances[$name])) {
            return $this->instances[$name];
        }

        if (isset($this->receipts[$name])) {
            $this->instances[$name] = $this->receipts[$name]();
        }

        return $this->instances[$name];
    }

}