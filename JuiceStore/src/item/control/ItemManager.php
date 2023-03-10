<?php

namespace app\item\control;


use app\comment\control\ICommentManagement;
use app\item\entity\IItemCatalogue;
use app\shared\control\AbstractController;


class ItemManager extends AbstractController implements IItemManagement
{
    private $itemRepository;
    private $commentManagement;

    public function __construct(IItemCatalogue $itemRepository, ICommentManagement $commentManagement)
    {
        $this->itemRepository = $itemRepository;
        $this->commentManagement = $commentManagement;
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
        $comments = $this->commentManagement->getAllCommentsById($id);


        $this->render("item", "ItemDetailsPage", [
            "item" => $item,
            "comments" => $comments
        ]);
    }


}


