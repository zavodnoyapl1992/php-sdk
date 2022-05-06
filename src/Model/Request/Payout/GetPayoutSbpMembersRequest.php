<?php

namespace KassaCom\SDK\Model\Request\Payout;

use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class GetPayoutSbpMembersRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    public function getRequiredFields()
    {
        return [];
    }

    public function getOptionalFields()
    {
        return [];
    }
}
