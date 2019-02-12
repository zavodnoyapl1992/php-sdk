<?php


namespace KassaCom\SDK\Model\Request\Refund;


use KassaCom\SDK\Model\Request\AbstractRequestTransport;

class CreateRefundTransport extends AbstractRequestTransport
{
    const PATH = 'refund/create';

    /**
     * @inheritDoc
     */
    public function getPath()
    {
        return self::PATH;
    }
}
