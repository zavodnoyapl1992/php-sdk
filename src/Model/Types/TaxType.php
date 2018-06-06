<?php


namespace KassaCom\SDK\Model\Types;


use KassaCom\SDK\Exception\Validation\InvalidPropertyException;
use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Request\Item\ItemsReceiptRequestItem;

class TaxType extends AbstractCustomType
{
    /**
     * @inheritDoc
     */
    public function validate($field)
    {
        $tax = $this->getValue($field);


        if (!in_array($tax, ItemsReceiptRequestItem::getAvailableTaxes(), true)) {
            throw new InvalidPropertyException('Unsupportable tax type', 0, $field);
        }

        return;
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
