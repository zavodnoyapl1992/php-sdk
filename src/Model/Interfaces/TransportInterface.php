<?php


namespace KassaCom\SDK\Model\Interfaces;


use KassaCom\SDK\Model\Request\AbstractRequestSerializer;
use KassaCom\SDK\Model\Request\AbstractRequestTransport;

interface TransportInterface
{
    /**
     * @param AbstractRequestSerializer $serializer
     *
     * @return AbstractRequestTransport
     */
    public function getTransport(AbstractRequestSerializer $serializer);
}
