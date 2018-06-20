<?php


namespace KassaCom\SDK\Model\Response\Payment;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Response\Item\AuthorizationItem;
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
    public function getisTest()
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
            'expire_date' => self::TYPE_DATE,
            'custom_parameters' => self::TYPE_ARRAY,
            'update_date' => self::TYPE_DATE,
            'is_test' => self::TYPE_BOOLEAN,
            'authorization' => AuthorizationItem::class,
        ];
    }
}
