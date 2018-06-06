<?php


namespace KassaCom\SDK\Model\Request\Payment;


use KassaCom\SDK\Model\Request\AbstractRequestTransport;
use KassaCom\SDK\Transport\AbstractApiTransport;

class CreatePaymentTransport extends AbstractRequestTransport
{
    const PATH = 'payment/create';

    /**
     * @inheritDoc
     */
    public function getPath()
    {
        return self::PATH;
    }

    /**
     * @inheritDoc
     */
    public function getMethod()
    {
        return AbstractApiTransport::METHOD_POST;
    }
}
