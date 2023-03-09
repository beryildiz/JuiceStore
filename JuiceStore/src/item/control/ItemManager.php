<?php

namespace app\item\control;

use app\comment\entity\ICommentCatalogue;
use app\item\entity\IItemCatalogue;
use app\shared\control\AbstractController;


class ItemManager extends AbstractController implements IItemManagement
{
    private $itemRepository;
    private $commentRepository;

    public function __construct(IItemCatalogue $itemRepository, ICommentCatalogue $commentRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->commentRepository = $commentRepository;
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

        if (isset($_POST['content'])) {
            $content = sanitize($_POST['content']);

            $this->commentRepository->createComment($id, $content);
        }

        $item = $this->itemRepository->findById($id);
        $comments = $this->commentRepository->getAllCommentsById($id);

        $this->render("item", "ItemDetailsPage", [
            "item" => $item,
            "comments" => $comments
        ]);
    }


}


