<?php


namespace KassaCom\SDK\Model\Response\Item;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\MethodItemTrait;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\PaymentType;
use KassaCom\SDK\Model\Types\PayoutCardType;

class PayoutMethodItem extends AbstractResponse
{
    use RecursiveRestoreTrait;
    use MethodItemTrait;

    /**
     * @var string
     */
    private $method;

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'method' => new PaymentType($this),
            'account' => AbstractResponse::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'type' => new PayoutCardType($this),
            'card' => CardItem::class,
        ];
    }
}
