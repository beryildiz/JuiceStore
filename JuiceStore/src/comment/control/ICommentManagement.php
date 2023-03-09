<?php

namespace app\comment\control;

interface ICommentManagement
{
    public function getAllCommentsById($id);

    public function createComment($id, $content);
}