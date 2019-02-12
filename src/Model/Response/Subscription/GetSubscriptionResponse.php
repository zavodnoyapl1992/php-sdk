<?php


namespace KassaCom\SDK\Model\Response\Subscription;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Response\Item\PaymentItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class GetSubscriptionResponse extends AbstractResponse
{
    use RecursiveRestoreTrait;

    const STATUS_INIT = 'init';
    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';
    const STATUS_DECLINE = 'decline';

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @var PaymentItem
     */
    private $parentPayment;

    /**
     * @var PaymentItem[]
     */
    private $payments;

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
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     *
     * @return $this
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * @return PaymentItem
     */
    public function getParentPayment()
    {
        return $this->parentPayment;
    }

    /**
     * @param PaymentItem $parentPayment
     *
     * @return $this
     */
    public function setParentPayment($parentPayment)
    {
        $this->parentPayment = $parentPayment;

        return $this;
    }

    /**
     * @return PaymentItem[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param PaymentItem[] $payments
     *
     * @return $this
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'token' => self::TYPE_STRING,
            'status' => self::TYPE_STRING,
            'create_date' => self::TYPE_DATE,
            'parent_payment' => PaymentItem::class,
            'payments' => [PaymentItem::class],
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
