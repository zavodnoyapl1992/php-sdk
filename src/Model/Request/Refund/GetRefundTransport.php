<?php


namespace KassaCom\SDK\Model\Request\Refund;


use KassaCom\SDK\Model\Request\AbstractRequestTransport;

class GetRefundTransport extends AbstractRequestTransport
{
    const PATH = 'refund/get';

    /**
     * @inheritDoc
     */
    public function getPath()
    {
        return self::PATH;
    }
}
