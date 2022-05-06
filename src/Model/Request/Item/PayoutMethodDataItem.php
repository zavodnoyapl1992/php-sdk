<?php

namespace KassaCom\SDK\Model\Request\Item;

use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\PaymentType;

class PayoutMethodDataItem extends AbstractRequestItem
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $account;

    /**
     * @var string|null
     */
    private $memberId;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param string $account
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * @param string|null $sbpMemberId
     *
     * @return $this
     */
    public function setMemberId($sbpMemberId)
    {
        $this->memberId = $sbpMemberId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'type' => new PaymentType($this),
            'account' => self::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'member_id' => self::TYPE_STRING,
        ];
    }
}
