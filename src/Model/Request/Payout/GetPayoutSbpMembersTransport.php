<?php

namespace KassaCom\SDK\Model\Request\Payout;

use KassaCom\SDK\Model\Request\AbstractRequestTransport;

class GetPayoutSbpMembersTransport extends AbstractRequestTransport
{
    const PATH = 'payout/sbp-members';

    /**
     * @inheritDoc
     */
    public function getPath()
    {
        return self::PATH;
    }
}
