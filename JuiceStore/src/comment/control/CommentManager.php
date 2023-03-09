<?php

namespace app\comment\control;

use app\comment\entity\ICommentCatalogue;
use app\shared\control\AbstractController;

class CommentManager extends AbstractController
{
    private $commentRepository;

    public function __construct(ICommentCatalogue $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

}