<?php

namespace app\shared\container;


use app\comment\control\CommentManager;
use app\comment\gateway\CommentRepository;
use app\home\control\HomeManagement;
use app\item\control\ItemManager;
use app\item\gateway\ItemRepository;

use PDO;
use PDOException;

/**
 * Dependency injection container class
 *
 * Injects needed instances of classes if needed.
 *
 */
class Container
{
    protected $factories = [];
    private $instances = [];


    /*
     * subscribe new factories to factories array and assign
     * an anonymous function that creates the needed instance of a class
     */
    public function __construct()
    {
        // add new factories here...
        $this->factories = [
            'itemManager' => $this->createItemManager(),
            'pdo' => $this->createPdo(),
            'homeManager' => $this->createHomeManager(),
            'commentManager' => $this->createCommentManager()
        ];
    }


    private function createItemManager()
    {
        return function () {
            return new ItemManager(
                new ItemRepository($this->make("pdo")),
                new CommentManager(new CommentRepository($this->make("pdo")))
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

    private function createHomeManager()
    {
        return function () {
            return new HomeManagement();
        };
    }

    private function createCommentManager()
    {
        return function () {
            return new CommentManager(
                new CommentRepository($this->make("pdo"))
            );
        };
    }


    /**
     * creates an instance of the class that is subscribed in the factories array
     *
     * @param $name - key of the factories array
     * @return mixed - instance of the class
     *
     * Usage:
     * return new ItemManager(
     * new ItemRepository($this->make("pdo"))
     *);
     */
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


