<?php


namespace KassaCom\SDK\Model\Request;


use KassaCom\SDK\Model\Response\Item\ErrorDetailsItem;
use KassaCom\SDK\Model\Response\Item\OrderResponseItem;
use KassaCom\SDK\Model\Response\Item\PaymentMethodItem;
use KassaCom\SDK\Model\Response\Item\WalletResponseItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\NotificationType;

class NotificationRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string|null
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
     * @var \DateTime|null
     */
    private $expireDate;

    /**
     * @var string|null
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
     * @var PaymentMethodItem|null
     */
    private $paymentMethod;

    /**
     * @var array|null
     */
    private $customParameters;

    /**
     * @var boolean|null
     */
    private $isTest;

    /**
     * @var object
     */
    private $notificationType;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setPartnerPaymentId($partnerPaymentId)
    {
        $this->partnerPaymentId = $partnerPaymentId;
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
     */
    public function setOrder($order)
    {
        $this->order = $order;
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
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;
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
     */
    public function setToken($token)
    {
        $this->token = $token;
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
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
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
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
    }

    /**
     * @return null|string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param null|string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
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
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @deprecated
     * @see getErrorDetails
     * @return null|string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * @deprecated
     * @see setErrorDetails
     * @param null|string $statusDescription
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
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
     */
    public function setErrorDetails($errorDetails)
    {
        $this->errorDetails = $errorDetails;
    }

    /**
     * @return PaymentMethodItem|null
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param PaymentMethodItem|null $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
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
     */
    public function setCustomParameters($customParameters)
    {
        $this->customParameters = $customParameters;
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
     */
    public function setIsTest($isTest)
    {
        $this->isTest = $isTest;
    }

    /**
     * @return object
     */
    public function getNotificationType()
    {
        return $this->notificationType;
    }

    /**
     * @param object $notificationType
     */
    public function setNotificationType($notificationType)
    {
        $this->notificationType = $notificationType;
    }

    public function getRequiredFields()
    {
        return [
            'id' => AbstractRequest::TYPE_INTEGER,
            'order' => OrderResponseItem::class,
            'wallet' => WalletResponseItem::class,
            'token' => AbstractRequest::TYPE_STRING,
            'create_date' => AbstractRequest::TYPE_DATE,
            'status' => AbstractRequest::TYPE_STRING,
            'notification_type' => new NotificationType($this),
        ];
    }

    public function getOptionalFields()
    {
        return [
            'partner_payment_id' => AbstractRequest::TYPE_STRING,
            'expire_date' => AbstractRequest::TYPE_DATE,
            'status_description' => AbstractRequest::TYPE_STRING,
            'payment_method' => PaymentMethodItem::class,
            'custom_parameters' => AbstractRequest::TYPE_ARRAY,
            'is_test' => AbstractRequest::TYPE_BOOLEAN,
            'error_details' => ErrorDetailsItem::class,
        ];
    }
}
