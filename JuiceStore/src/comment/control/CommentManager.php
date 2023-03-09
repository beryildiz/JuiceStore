<?php

namespace app\comment\control;

use app\comment\entity\ICommentCatalogue;
use app\shared\control\AbstractController;

class CommentManager extends AbstractController implements ICommentManagement
{
    private $commentRepository;

    public function __construct(ICommentCatalogue $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getAllCommentsById($id)
    {
        // if something posted, persist in database
        if (isset($_POST['content'])) {
            $content = sanitize($_POST['content']);
            $this->createComment($id, $content);
        }

        return $this->commentRepository->getAllCommentsById($id);
    }

    public function createComment($id, $content)
    {
        $this->commentRepository->createComment($id, $content);
    }
}