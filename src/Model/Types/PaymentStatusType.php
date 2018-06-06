<?php


namespace KassaCom\SDK\Model\Types;


use KassaCom\SDK\Exception\Validation\InvalidPropertyException;
use KassaCom\SDK\Model\PaymentStatuses;
use KassaCom\SDK\Model\Request\AbstractRequest;

class PaymentStatusType extends AbstractCustomType
{
    /**
     * @inheritDoc
     */
    public function validate($field)
    {
        $paymentStatus = $this->getValue($field);

        if (!in_array($paymentStatus, PaymentStatuses::getStatuses(), true)) {
            throw new InvalidPropertyException('Unsupportable payment status', 0, $field);
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
        return AbstractRequest::TYPE_STRING;
    }
}
