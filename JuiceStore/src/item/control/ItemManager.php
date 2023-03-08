<?php

namespace app\item\control;

use app\shared\AbstractController;
use ItemRepository;

class ItemManager extends AbstractController implements IItemManagement
{
    private $itemRepository;

    public function __construct(ItemRepository  $itemRepository){
        $this->itemRepository = $itemRepository;
    }



}