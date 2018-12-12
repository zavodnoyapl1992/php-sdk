<?php


namespace KassaCom\SDK\Model\Request\Wallet;


use KassaCom\SDK\Model\Interfaces\TransportInterface;
use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Request\AbstractRequestSerializer;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class WalletRequest extends AbstractRequest implements TransportInterface
{
    use RecursiveRestoreTrait;

    /** @var string */
    private $id;

    /**
     * WalletRequest constructor.
     *
     * @param string $id
     */
    public function __construct($id)
    {
        $this->setId($id);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        if (is_int($id)) {
            $id = (string)$id;
        }

        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'id' => AbstractRequest::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getTransport(AbstractRequestSerializer $serializer)
    {
        return new WalletTransport($serializer);
    }
}
