<?php

namespace KassaCom\SDK\Model\Request\Payment;


use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Request\Item\OrderRequestItem;
use KassaCom\SDK\Model\Request\Item\ReceiptRequestItem;
use KassaCom\SDK\Model\Request\Item\SettingsRequestItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class CreatePaymentRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * @var OrderRequestItem
     */
    private $order;

    /**
     * @var SettingsRequestItem
     */
    private $settings;

    /**
     * @var string[]
     */
    private $customParameters;

    /**
     * @var ReceiptRequestItem
     */
    private $receipt;

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
     * @return CreatePaymentRequest
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return SettingsRequestItem
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param SettingsRequestItem $settings
     *
     * @return CreatePaymentRequest
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;

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
     * @return CreatePaymentRequest
     */
    public function setCustomParameters($customParameters)
    {
        $this->customParameters = $customParameters;

        return $this;
    }

    /**
     * @return ReceiptRequestItem
     */
    public function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * @param ReceiptRequestItem $receipt
     *
     * @return $this
     */
    public function setReceipt($receipt)
    {
        $this->receipt = $receipt;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'order' => OrderRequestItem::class,
            'settings' => SettingsRequestItem::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'custom_parameters' => RestorableInterface::TYPE_ARRAY,
            'receipt' => ReceiptRequestItem::class,
        ];
    }
}
