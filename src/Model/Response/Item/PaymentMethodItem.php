<?php


namespace KassaCom\SDK\Model\Response\Item;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\MethodItemTrait;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\PaymentType;

class PaymentMethodItem extends AbstractResponse
{
    use RecursiveRestoreTrait;
    use MethodItemTrait;

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'type' => new PaymentType($this),
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'account' => self::TYPE_STRING,
            'rrn' => self::TYPE_STRING,
            'card' => CardItem::class,
        ];
    }
}
