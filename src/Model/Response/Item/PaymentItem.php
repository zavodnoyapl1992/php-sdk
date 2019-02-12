<?php


namespace KassaCom\SDK\Model\Response\Item;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Response\Payment\GetPaymentResponseTrait;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class PaymentItem extends AbstractResponse
{
    use RecursiveRestoreTrait;
    use GetPaymentResponseTrait;
}
