<?php

namespace KassaCom\SDK\Model\Response\Payment;

use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Response\Item\OrderResponseItem;
use KassaCom\SDK\Model\Response\Item\ProjectResponseItem;
use KassaCom\SDK\Model\Response\Item\WalletResponseItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class CreatePaymentResponse extends AbstractResponse
{
    use RecursiveRestoreTrait;
    use GetPaymentResponseTrait;

    /**
     * @var string
     */
    private $paymentUrl;

    /**
     * @return string
     */
    public function getPaymentUrl()
    {
        return $this->paymentUrl;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'id' => AbstractResponse::TYPE_INTEGER,
            'order' => OrderResponseItem::class,
            'token' => AbstractResponse::TYPE_STRING,
            'status' => AbstractResponse::TYPE_STRING,
            'payment_url' => AbstractResponse::TYPE_STRING,
            'create_date' => AbstractResponse::TYPE_DATE,
            'wallet' => WalletResponseItem::class,
            'project' => ProjectResponseItem::class,
        ];
    }
}
