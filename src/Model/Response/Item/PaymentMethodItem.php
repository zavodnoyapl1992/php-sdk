<?php


namespace KassaCom\SDK\Model\Response\Item;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\MethodItemTrait;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\PaymentType;

class PaymentMethodItem extends AbstractResponse
{
    use RecursiveRestoreTrait;
    use MethodItemTrait;

    /** @var string|null */
    protected $qrLink;

    /** @var string|null */
    protected $qrImage;

    /**
     * @return string|null
     */
    public function getQrLink()
    {
        return $this->qrLink;
    }

    /**
     * @param string|null $qrLink
     *
     * @return $this
     */
    public function setQrLink($qrLink)
    {
        $this->qrLink = $qrLink;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQrImage()
    {
        return $this->qrImage;
    }

    /**
     * @param string|null $qrImage
     *
     * @return $this
     */
    public function setQrImage($qrImage)
    {
        $this->qrImage = $qrImage;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'type' => new PaymentType($this),
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'account' => self::TYPE_STRING,
            'rrn' => self::TYPE_STRING,
            'card' => CardItem::class,
            'qr_link' => self::TYPE_STRING,
            'qr_image' => self::TYPE_STRING,
        ];
    }
}
