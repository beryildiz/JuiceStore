<?php

namespace app\comment\entity;

interface ICommentCatalogue
{
    public function getAllCommentsById($id);

    public function createComment($id, $content);
}