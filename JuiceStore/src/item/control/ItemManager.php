<?php

namespace app\item\control;

use app\comment\control\CommentManager;
use app\comment\control\ICommentManagement;
use app\comment\entity\ICommentCatalogue;
use app\item\entity\IItemCatalogue;
use app\shared\control\AbstractController;


class ItemManager extends AbstractController implements IItemManagement
{
    protected $itemRepository;
    protected $commentManager;

    public function __construct(IItemCatalogue $itemRepository, ICommentCatalogue $commentCatalogue)
    {
        $this->itemRepository = $itemRepository;
        $this->commentManager = $commentCatalogue;

    }

    public function index()
    {
        // superclass
        $items = $this->itemRepository->getAll();

        // render content here
        $this->render("item", "ItemPage", [
            "items" => $items
        ]);
    }

    public function show()
    {
        $id = $_GET['id'];
        $item = $this->itemRepository->findById($id);
        $comments = $this->commentManager->getAllCommentsById($id);

        $this->render("item", "ItemDetailsPage", [
            "item" => $item,
            "comments" => $comments
        ]);


    }
}


