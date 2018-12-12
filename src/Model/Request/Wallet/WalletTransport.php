<?php


namespace KassaCom\SDK\Model\Request\Wallet;


use KassaCom\SDK\Model\Request\AbstractRequestTransport;
use KassaCom\SDK\Transport\AbstractApiTransport;

class WalletTransport extends AbstractRequestTransport
{
    const PATH = 'wallet/get';

    public function getPath()
    {
        return self::PATH;
    }

    public function getMethod()
    {
        return AbstractApiTransport::METHOD_POST;
    }
}
