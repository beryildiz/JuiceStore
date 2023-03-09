<?php

namespace app\item\gateway;

use app\item\entity\IItemCatalogue;
use app\shared\repository\AbstractRepository;


class ItemRepository extends AbstractRepository implements IItemCatalogue
{
    /**
     * @return string - return the table name from Item as a string
     */
    protected function getTableName()
    {
        return "item";
    }

    /**
     * @return string - return the entity of the module as a string
     */
    protected function getEntityName()
    {
        return "app\\item\\entity\\Item";
    }
}