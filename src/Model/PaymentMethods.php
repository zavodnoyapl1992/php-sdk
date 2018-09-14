<?php

namespace KassaCom\SDK\Model;

final class PaymentMethods
{
    /** @var string Payment method - qiwi */
    const PAYMENT_METHOD_QIWI = 'qiwi';

    /** @var string Payment method - card */
    const PAYMENT_METHOD_CARD = 'card';

    /** @var string Payment method - mobile */
    const PAYMENT_METHOD_MOBILE = 'mobile';

    /** @var string Payment method - webmoney */
    const PAYMENT_METHOD_WEBMONEY = 'webmoney';

    /** @var string Payment method - yandex */
    const PAYMENT_METHOD_YANDEX = 'yandex';

    /**
     * @return array
     */
    public static function getAvailablePaymentMethods()
    {
        return [
            self::PAYMENT_METHOD_QIWI,
            self::PAYMENT_METHOD_CARD,
            self::PAYMENT_METHOD_MOBILE,
            self::PAYMENT_METHOD_WEBMONEY,
            self::PAYMENT_METHOD_YANDEX
        ];
    }
}
