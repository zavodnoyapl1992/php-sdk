<?php


namespace KassaCom\SDK\Model\Types;


use KassaCom\SDK\Exception\Validation\InvalidPropertyException;
use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Request\Item\FeeItem;

class FeeType extends AbstractCustomType
{
    /**
     * @inheritDoc
     */
    public function validate($field)
    {
        $value = $this->getValue($field);

        if (!in_array($value, [FeeItem::TYPE_PAYOUT, FeeItem::TYPE_WALLET], true)) {
            throw new InvalidPropertyException('Unsupportable payment type', 0, $field);
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function isAccept()
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getBaseType()
    {
        return RestorableInterface::TYPE_STRING;
    }
}
