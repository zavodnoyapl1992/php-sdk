<?php

namespace KassaCom\SDK\Model\Request\Payment;

use KassaCom\SDK\Model\Request\AbstractRequestTransport;

class ApplePayVerifyTransport extends AbstractRequestTransport
{
    const PATH = 'payment/apple/verify';

    /**
     * @inheritDoc
     */
    public function getPath()
    {
        return self::PATH;
    }
}
