<?php


namespace KassaCom\SDK\Model\Response\Item;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\PaymentType;
use KassaCom\SDK\Model\Types\PayoutCardType;

class PayoutMethodItem extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string
     */
    private $account;

    /**
     * @var PayoutCardItem
     */
    private $card;

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
     * @return null|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param string $account
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return PayoutCardItem
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param PayoutCardItem $card
     *
     * @return $this
     */
    public function setCard($card)
    {
        $this->card = $card;

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
            'card' => PayoutCardItem::class,
        ];
    }
}
