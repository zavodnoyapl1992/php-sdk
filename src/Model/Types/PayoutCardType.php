<?php


namespace KassaCom\SDK\Model\Types;


use KassaCom\SDK\Exception\Validation\InvalidPropertyException;
use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\PaymentMethods;
use KassaCom\SDK\Model\PayoutCardTypes;
use KassaCom\SDK\Model\Response\Item\PayoutMethodItem;

class PayoutCardType extends AbstractCustomType
{
    /**
     * @inheritDoc
     */
    public function validate($field)
    {
        $value = $this->getValue($field);

        if ($this->object->getMethod() === PaymentMethods::PAYMENT_METHOD_CARD
            && !in_array($value, PayoutCardTypes::getAvailableCardTypes(), true)) {
            throw new InvalidPropertyException('Unsupportable card type', 0, $field);
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function isAccept()
    {
        return $this->object instanceof PayoutMethodItem;
    }

    /**
     * @inheritDoc
     */
    public function getBaseType()
    {
        return RestorableInterface::TYPE_STRING;
    }
}
