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
        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE item_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $model);
    }

    public function createComment($id, $content)
    {
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("Insert into `$table`(`content`, `item_id`) values (?, ?)");
        $stmt->execute([$content, $id]);
    }
}