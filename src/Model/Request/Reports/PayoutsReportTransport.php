<?php


namespace KassaCom\SDK\Model\Request\Reports;


use KassaCom\SDK\Model\Request\AbstractRequestTransport;
use KassaCom\SDK\Transport\AbstractApiTransport;

class PayoutsReportTransport extends AbstractRequestTransport
{
    const PATH = 'report/payouts/registry.csv';

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
        return AbstractApiTransport::METHOD_GET;
    }
}
