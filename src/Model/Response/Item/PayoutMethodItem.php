<?php


namespace KassaCom\SDK\Model\Response\Item;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\MethodItemTrait;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\PaymentType;
use KassaCom\SDK\Model\Types\PayoutCardType;

class PayoutMethodItem extends AbstractResponse
{
    use RecursiveRestoreTrait;
    use MethodItemTrait;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string|null
     */
    private $sbpMemberId;

    /**
     * @var string|null
     */
    private $sbpReceiverPam;

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    public function getSbpMemberId()
    {
        return $this->sbpMemberId;
    }

    /**
     * @param string|null $sbpMemberId
     */
    public function setSbpMemberId($sbpMemberId)
    {
        $this->sbpMemberId = $sbpMemberId;
    }

    public function getSbpReceiverPam()
    {
        return $this->sbpReceiverPam;
    }

    /**
     * @param string|null $sbpReceiverPam
     */
    public function setSbpReceiverPam($sbpReceiverPam)
    {
        $this->sbpReceiverPam = $sbpReceiverPam;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'method' => new PaymentType($this),
            'account' => AbstractResponse::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'type' => new PayoutCardType($this),
            'rrn' => self::TYPE_STRING,
            'card' => CardItem::class,
            'sbp_member_id' => self::TYPE_STRING,
            'sbp_receiver_pam' => self::TYPE_STRING,
        ];
    }
}
