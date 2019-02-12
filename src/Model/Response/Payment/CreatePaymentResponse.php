<?php

namespace KassaCom\SDK\Model\Response\Payment;


use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Response\Item\OrderResponseItem;
use KassaCom\SDK\Model\Response\Item\WalletResponseItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class CreatePaymentResponse extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /**
     * @var int
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
     * @var \DateTime
     */
    private $updateDate;

    /**
     * @var \DateTime
     */
    private $expireDate;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string[]
     */
    private $customParameters;


    /**
     * @var string
     */
    private $paymentUrl;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return OrderResponseItem
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }


    /**
     * @return \DateTime|null
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @return \DateTime
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string[]
     */
    public function getCustomParameters()
    {
        return $this->customParameters;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getPaymentUrl()
    {
        return $this->paymentUrl;
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
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'partner_payment_id' => AbstractResponse::TYPE_STRING,
            'custom_parameters' => RestorableInterface::TYPE_ARRAY,
            'expire_date' => RestorableInterface::TYPE_DATE,
            'update_date' => RestorableInterface::TYPE_DATE,
            'wallet' => WalletResponseItem::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'id' => RestorableInterface::TYPE_INTEGER,
            'token' => RestorableInterface::TYPE_STRING,
            'status' => RestorableInterface::TYPE_STRING,
            'payment_url' => RestorableInterface::TYPE_STRING,
            'create_date' => RestorableInterface::TYPE_DATE,
            'order' => OrderResponseItem::class,
        ];
    }
}
