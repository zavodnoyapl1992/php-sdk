<?php

namespace KassaCom\SDK\Model\Request\Item;

use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class MoneyItem extends AbstractRequestItem
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var float
     */
    private $amount;

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
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'currency' => self::TYPE_STRING,
            'amount' => self::TYPE_FLOAT,
        ];
    }

    public function getOptionalFields()
    {
        return [];
    }
}
