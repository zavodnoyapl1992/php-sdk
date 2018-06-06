<?php


namespace KassaCom\SDK\Model\Response\Item;


use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\OrderItemTrait;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class OrderResponseItem extends AbstractResponse
{
    use OrderItemTrait;
    use RecursiveRestoreTrait;

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'description' => RestorableInterface::TYPE_STRING,
        ];
    }

    public function getRequiredFields()
    {
        return [
            'currency' => RestorableInterface::TYPE_STRING,
            'amount' => RestorableInterface::TYPE_FLOAT,
        ];
    }
}
