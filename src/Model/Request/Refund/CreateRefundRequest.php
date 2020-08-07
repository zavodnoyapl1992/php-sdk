<?php


namespace KassaCom\SDK\Model\Request\Refund;


use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Request\Item\RefundReceiptRequestItem;
use KassaCom\SDK\Model\Request\Item\RefundRequestItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class CreateRefundRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $token;

    /**
     * @var RefundRequestItem
     */
    private $refund;

    /**
     * @var string|null
     */
    private $partnerPaymentId;

    /**
     * @var RefundReceiptRequestItem
     */
    private $receipt;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return RefundRequestItem
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * @param RefundRequestItem $refund
     *
     * @return $this
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;

        return $this;
    }

    /**
     * @return RefundReceiptRequestItem
     */
    public function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * @param RefundReceiptRequestItem $receipt
     *
     * @return $this
     */
    public function setReceipt($receipt)
    {
        $this->receipt = $receipt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPartnerPaymentId()
    {
        return $this->partnerPaymentId;
    }

    /**
     * @param string|null $partnerPaymentId
     *
     * @return $this
     */
    public function setPartnerPaymentId($partnerPaymentId)
    {
        $this->partnerPaymentId = $partnerPaymentId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'token' => self::TYPE_STRING,
            'refund' => RefundRequestItem::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'partner_payment_id' => self::TYPE_STRING,
            'receipt' => RefundReceiptRequestItem::class,
        ];
    }
}
