<?php


namespace KassaCom\SDK\Model\Request\Payout;


use KassaCom\SDK\Model\Request\AbstractRequestTransport;
use KassaCom\SDK\Transport\AbstractApiTransport;

class GetPayoutTransport extends AbstractRequestTransport
{
    const PATH = 'payout/get';

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
