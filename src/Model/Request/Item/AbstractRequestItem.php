<?php

namespace KassaCom\SDK\Model\Request\Item;


use KassaCom\SDK\Model\Interfaces\RestorableInterface;

abstract class AbstractRequestItem implements RestorableInterface
{
    /**
     * @inheritDoc
     */
    public function getThoughOneField()
    {
        return [];
    }
}
