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

    /** @var string Payment method - using card fingerprint signature */
    const PAYMENT_METHOD_CARD_FINGERPRINT = 'card_fingerprint';

    /** @var string Payment method - tokenized: Apple Pay, Google Pay etc */
    const PAYMENT_METHOD_CARD_TOKENIZED = 'tokenized';

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
            self::PAYMENT_METHOD_YANDEX,
            self::PAYMENT_METHOD_CARD_FINGERPRINT,
            self::PAYMENT_METHOD_CARD_TOKENIZED,
        ];
    }
}
