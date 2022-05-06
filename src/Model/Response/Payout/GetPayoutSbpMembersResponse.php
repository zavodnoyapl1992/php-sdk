<?php

namespace KassaCom\SDK\Model\Response\Payout;

use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Response\Item\SbpMemberItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class GetPayoutSbpMembersResponse extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /**
     * @var SbpMemberItem[]
     */
    private $members;

    public function getRequiredFields()
    {
        return [
            'members' => [SbpMemberItem::class],
        ];
    }

    public function getOptionalFields()
    {
        return [];
    }
}
