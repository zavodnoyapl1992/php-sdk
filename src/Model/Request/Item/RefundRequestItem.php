<?php


namespace KassaCom\SDK\Model\Request\Item;


use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class RefundRequestItem extends AbstractRequestItem implements \JsonSerializable
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
     * @var string
     */
    private $reason;

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
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'amount' => self::TYPE_FLOAT,
            'currency' => self::TYPE_STRING,
            'reason' => self::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        $data = [
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'reason' => $this->getReason(),
        ];

        $data = array_filter($data, function ($param) {
            return !empty($param);
        });

        return $data;
    }
}
