<?php


namespace KassaCom\SDK\Model\Request\Subscription;


use KassaCom\SDK\Model\Request\AbstractRequestTransport;

class GetSubscriptionTransport extends AbstractRequestTransport
{
    const PATH = 'subscription/get';

    public function getPath()
    {
        return self::PATH;
    }
}
