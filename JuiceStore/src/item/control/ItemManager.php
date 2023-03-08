<?php

namespace app\item\control;

use app\item\gateway\ItemRepository;
use app\shared\AbstractController;


class ItemManager extends AbstractController implements IItemManagement
{
    protected $itemRepository;

    public function __construct(ItemRepository  $itemRepository){
        $this->itemRepository = $itemRepository;
    }



}