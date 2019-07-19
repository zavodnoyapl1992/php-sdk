<?php


namespace KassaCom\SDK\Model\Request\Payout;


use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Request\Item\OrderRequestItem;
use KassaCom\SDK\Model\Request\Item\PayoutMethodDataItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\FeeType;

class CreatePayoutRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $transactionId;
    /**
     * @var integer|null
     */
    private $walletId;
    /**
     * @var PayoutMethodDataItem
     */
    private $payoutMethodData;
    /**
     * @var string|null
     */
    private $feeType;
    /**
     * @var OrderRequestItem
     */
    private $order;

    /**
     * @var string[]
     */
    private $customParameters;

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     *
     * @return $this
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * @param int|null $walletId
     *
     * @return $this
     */
    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;

        return $this;
    }

    /**
     * @return PayoutMethodDataItem
     */
    public function getPayoutMethodData()
    {
        return $this->payoutMethodData;
    }

    /**
     * @param PayoutMethodDataItem $payoutMethodData
     *
     * @return $this
     */
    public function setPayoutMethodData($payoutMethodData)
    {
        $this->payoutMethodData = $payoutMethodData;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * @param null|string $feeType
     *
     * @return $this
     */
    public function setFeeType($feeType)
    {
        $this->feeType = $feeType;

        return $this;
    }

    /**
     * @return OrderRequestItem
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param OrderRequestItem $order
     *
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getCustomParameters()
    {
        return $this->customParameters;
    }

    /**
     * @param string[] $customParameters
     *
     * @return $this
     */
    public function setCustomParameters($customParameters)
    {
        $this->customParameters = $customParameters;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'transaction_id' => self::TYPE_STRING,
            'payout_method_data' => PayoutMethodDataItem::class,
            'order' => OrderRequestItem::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'fee_type' => new FeeType($this),
            'wallet_id' => self::TYPE_INTEGER,
            'custom_parameters' => self::TYPE_ARRAY,
        ];
    }
}
