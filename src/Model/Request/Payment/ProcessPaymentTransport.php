<?php


namespace KassaCom\SDK\Model\Request\Payment;


use KassaCom\SDK\Model\Request\AbstractRequestTransport;
use KassaCom\SDK\Transport\AbstractApiTransport;

class ProcessPaymentTransport extends AbstractRequestTransport
{
    const PATH = 'payment/process';
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
