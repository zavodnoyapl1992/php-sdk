<?php


namespace KassaCom\SDK\Model\Response\Item;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class MoneyItem extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /**
     * @var float
     */
    private $amount;
    /**
     * @var string
     */
    private $currency;

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'amount' => self::TYPE_FLOAT,
            'currency' => self::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [];
    }
}
