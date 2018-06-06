<?php


namespace KassaCom\SDK\Model\Request\Item;


use KassaCom\SDK\Model\Traits\OrderItemTrait;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class OrderRequestItem extends AbstractRequestItem
{
    use OrderItemTrait;
    use RecursiveRestoreTrait;

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'currency' => self::TYPE_STRING,
            'amount' => self::TYPE_FLOAT,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'description' => self::TYPE_STRING,
        ];
    }
}
