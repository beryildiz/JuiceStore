<?php

namespace app\comment\gateway;

use app\comment\entity\ICommentCatalogue;
use app\shared\repository\AbstractRepository;
use PDO;

class CommentRepository extends AbstractRepository implements ICommentCatalogue
{

    protected function getTableName()
    {
        return "comment";
    }

    protected function getEntityName()
    {
        return "app\\comment\\entity\\Comment";
    }

    public function getAllCommentsById($id)
    {
        $table = $this->getTableName();
        $model = $this->getEntityName();

        // SELECT * FROM COMMENT Inner JOIN USER on COMMENT.user_id = USER.id;
        // $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE item_id = ?");

        $sql = "SELECT * FROM {$table} Inner JOIN USER on COMMENT.user_id = USER.id where item_id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll(PDO::FETCH_CLASS, $model);
    }

    public function createComment($id, $content)
    {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("Insert into `$table`(`content`, `item_id`, `user_id`) values (?, ?)");
        $statement->execute([$content, $id]);
    }
}