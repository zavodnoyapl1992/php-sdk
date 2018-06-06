<?php

namespace KassaCom\SDK\Model;

final class PaymentMethods
{
    /** @var string Payment method - QIWI */
    const PAYMENT_METHOD_QIWI = 'qiwi';

    /** @var string Payment method - card */
    const PAYMENT_METHOD_CARD = 'card';

    /**
     * @return array
     */
    public static function getAvailablePaymentMethods()
    {
        return [
            self::PAYMENT_METHOD_QIWI,
            self::PAYMENT_METHOD_CARD,
        ];
    }
}
