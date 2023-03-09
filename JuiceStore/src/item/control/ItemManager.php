<?php

namespace app\item\control;

use app\item\gateway\ItemRepository;
use app\shared\control\AbstractController;


class ItemManager extends AbstractController implements IItemManagement
{
    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;

    }

    public function index()
    {
        // superclass
        $items = $this->itemRepository->getAll();

        // render content here
        $this->render("item", "ItemView", [
            "items" => $items
        ]);


    }

    public function show()
    {
        $id = $_GET['id'];
        $item = $this->itemRepository->findById($id);

        $this->render("item", "ItemDetails", [
            "item" => $item
        ]);


    }
}


