<?php

namespace app\user\gateway;

use app\shared\repository\AbstractRepository;
use app\user\entity\IUserCatalogue;
use app\user\entity\User;
use PDO;

class UserRepository extends AbstractRepository implements IUserCatalogue
{

    protected function getTableName()
    {
        return "user";
    }

    protected function getEntityName()
    {
        return "app\\user\\entity\\User";
    }

    public function getUserByName($username)
    {
        $table = $this->getTableName();
        $model = $this->getEntityName();
        $statement = $this->pdo->prepare("select * from `$table` where username = ?");
        $statement->execute([$username]);
        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        return $statement->fetch(PDO::FETCH_CLASS);
    }

    public function getUserByRole($role)
    {
        $table = $this->getTableName();
        $model = $this->getEntityName();
        $statement = $this->pdo->query("select * from `$table` where role = ?");
        $statement->execute([$role]);
        return $statement->fetchAll(PDO::FETCH_CLASS, $model);
    }

    public function persist(User $user)
    {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("insert into `$table`(`username`,`password`,`role`) values (?,?,?)");
        return $statement->execute([$user->username, $user->password, $user->role]);
    }
}