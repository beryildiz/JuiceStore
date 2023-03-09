<?php

namespace app\item\gateway;

use app\item\entity\IItemCatalogue;
use app\shared\repository\AbstractRepository;


class ItemRepository extends AbstractRepository implements IItemCatalogue
{
    protected function getTableName()
    {
        return "item";
    }

    protected function getEntityName()
    {
        return "app\\item\\entity\\Item";
    }
}