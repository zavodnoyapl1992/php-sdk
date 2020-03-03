<?php


namespace KassaCom\SDK\Model\Response\Payment;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Response\Item\AuthorizationItem;
use KassaCom\SDK\Model\Response\Item\ErrorDetailsItem;
use KassaCom\SDK\Model\Response\Item\MoneyItem;
use KassaCom\SDK\Model\Response\Item\OrderResponseItem;
use KassaCom\SDK\Model\Response\Item\PaymentMethodItem;
use KassaCom\SDK\Model\Response\Item\WalletResponseItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class ProcessPaymentResponse extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var int|null
     */
    private $partnerPaymentId;

    /**
     * @var OrderResponseItem
     */
    private $order;

    /**
     * @var WalletResponseItem
     */
    private $wallet;

    /**
     * @var string
     */
    private $token;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @var \DateTime
     */
    private $updateDate;

    /**
     * @var \DateTime|null
     */
    private $expireDate;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $status;

    /**
     * @deprecated
     * @see $errorDetails
     * @var string|null
     */
    private $statusDescription;

    /**
     * @var ErrorDetailsItem|null
     */
    private $errorDetails;

    /**
     * @var PaymentMethodItem
     */
    private $paymentMethod;

    /**
     * @var array|null
     */
    private $customParameters;

    /**
     * @var bool|null
     */
    private $isTest;

    /**
     * @var AuthorizationItem|null
     */
    private $authorization;

    /**
     * @var boolean|null
     */
    private $availableFullRefund;

    /**
     * @var boolean|null
     */
    private $availablePartialRefund;

    /**
     * @var MoneyItem|null
     */
    private $availableForRefund;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPartnerPaymentId()
    {
        return $this->partnerPaymentId;
    }

    /**
     * @param int|null $partnerPaymentId
     *
     * @return $this
     */
    public function setPartnerPaymentId($partnerPaymentId)
    {
        $this->partnerPaymentId = $partnerPaymentId;

        return $this;
    }

    /**
     * @return OrderResponseItem
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param OrderResponseItem $order
     *
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return WalletResponseItem
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @param WalletResponseItem $wallet
     *
     * @return $this
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;

        return $this;
    }

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
     * @return \DateTime|null
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @param \DateTime $updateDate
     *
     * @return $this
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param \DateTime|null $expireDate
     *
     * @return $this
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     *
     * @return $this
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

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
     * @return string|null
     * @deprecated
     * @see getErrorDetails()
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * @param string|null $statusDescription
     *
     * @return $this
     * @deprecated
     * @see setErrorDetails()
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;

        return $this;
    }

    /**
     * @return ErrorDetailsItem|null
     */
    public function getErrorDetails()
    {
        return $this->errorDetails;
    }

    /**
     * @param ErrorDetailsItem|null $errorDetails
     *
     * @return $this
     */
    public function setErrorDetails($errorDetails)
    {
        $this->errorDetails = $errorDetails;

        return $this;
    }

    /**
     * @return PaymentMethodItem
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param PaymentMethodItem $paymentMethod
     *
     * @return $this
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCustomParameters()
    {
        return $this->customParameters;
    }

    /**
     * @param array|null $customParameters
     *
     * @return $this
     */
    public function setCustomParameters($customParameters)
    {
        $this->customParameters = $customParameters;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsTest()
    {
        return $this->isTest;
    }

    /**
     * @param bool|null $isTest
     *
     * @return $this
     */
    public function setIsTest($isTest)
    {
        $this->isTest = $isTest;

        return $this;
    }

    /**
     * @return AuthorizationItem|null
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * @param AuthorizationItem|null $authorization
     *
     * @return $this
     */
    public function setAuthorization($authorization)
    {
        $this->authorization = $authorization;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAvailableFullRefund()
    {
        return $this->availableFullRefund;
    }

    /**
     * @param bool|null $availableFullRefund
     *
     * @return $this
     */
    public function setAvailableFullRefund($availableFullRefund)
    {
        $this->availableFullRefund = $availableFullRefund;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAvailablePartialRefund()
    {
        return $this->availablePartialRefund;
    }

    /**
     * @param bool|null $availablePartialRefund
     *
     * @return $this
     */
    public function setAvailablePartialRefund($availablePartialRefund)
    {
        $this->availablePartialRefund = $availablePartialRefund;

        return $this;
    }

    /**
     * @return MoneyItem|null
     */
    public function getAvailableForRefund()
    {
        return $this->availableForRefund;
    }

    /**
     * @param MoneyItem|null $availableForRefund
     *
     * @return $this
     */
    public function setAvailableForRefund($availableForRefund)
    {
        $this->availableForRefund = $availableForRefund;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'id' => self::TYPE_INTEGER,
            'order' => OrderResponseItem::class,
            'wallet' => WalletResponseItem::class,
            'token' => self::TYPE_STRING,
            'create_date' => self::TYPE_DATE,
            'ip' => self::TYPE_STRING,
            'status' => self::TYPE_STRING,
            'payment_method' => PaymentMethodItem::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'partner_payment_id' => self::TYPE_STRING,
            'expire_date' => self::TYPE_DATE,
            'custom_parameters' => self::TYPE_ARRAY,
            'update_date' => self::TYPE_DATE,
            'is_test' => self::TYPE_BOOLEAN,
            'authorization' => AuthorizationItem::class,
            'available_full_refund' => self::TYPE_BOOLEAN,
            'available_partial_refund' => self::TYPE_BOOLEAN,
            'available_for_refund' => MoneyItem::class,
            'status_description' => self::TYPE_STRING,
            'error_details' => ErrorDetailsItem::class,
        ];
    }
}
