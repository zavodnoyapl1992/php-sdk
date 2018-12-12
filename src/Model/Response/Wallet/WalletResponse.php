<?php


namespace KassaCom\SDK\Model\Response\Wallet;


use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Response\Item\BalanceItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class WalletResponse extends AbstractResponse
{
    const WALLET_TYPE_INDIVIDUAL = 'individual';

    const WALLET_TYPE_LEGAL = 'legal';

    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var BalanceItem
     */
    private $balance;

    /**
     * @var string
     */
    private $type;

    /**
     * @var boolean
     */
    private $isIdentified;

    /**
     * @var boolean
     */
    private $isDefault;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return BalanceItem
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param BalanceItem $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function getIsIdentified()
    {
        return $this->isIdentified;
    }

    /**
     * @param bool $isIdentified
     */
    public function setIsIdentified($isIdentified)
    {
        $this->isIdentified = $isIdentified;
    }

    /**
     * @return bool
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param bool $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }

    /**
     * @return bool
     */
    public function isLegal()
    {
        return $this->getType() == self::WALLET_TYPE_LEGAL;
    }

    /**
     * @return bool
     */
    public function isIndividual()
    {
        return $this->getType() == self::WALLET_TYPE_INDIVIDUAL;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'id' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
            'balance' => BalanceItem::class,
            'type' => self::TYPE_STRING,
            'is_identified' => self::TYPE_BOOLEAN,
            'is_default' => self::TYPE_BOOLEAN,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [];
    }
}
