<?php


namespace KassaCom\SDK\Model\Types;


use KassaCom\SDK\Exception\Validation\InvalidPropertyException;
use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\PaymentMethods;

class PaymentType extends AbstractCustomType
{
    /**
     * @inheritDoc
     */
    public function validate($field)
    {
        $paymentMethod = $this->getValue($field);

        if (!in_array($paymentMethod, PaymentMethods::getAvailablePaymentMethods(), true)) {
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
