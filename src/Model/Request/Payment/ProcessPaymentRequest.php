<?php

namespace KassaCom\SDK\Model\Request\Payment;


use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Request\Item\PaymentMethodDataItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class ProcessPaymentRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var PaymentMethodDataItem
     */
    private $paymentMethodData;

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
     * @return PaymentMethodDataItem
     */
    public function getPaymentMethodData()
    {
        return $this->paymentMethodData;
    }

    /**
     * @param PaymentMethodDataItem $paymentMethodData
     *
     * @return $this
     */
    public function setPaymentMethodData($paymentMethodData)
    {
        $this->paymentMethodData = $paymentMethodData;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'token' => self::TYPE_STRING,
            'ip' => self::TYPE_STRING,
            'payment_method_data' => PaymentMethodDataItem::class,
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
