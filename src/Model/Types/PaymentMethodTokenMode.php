<?php

namespace KassaCom\SDK\Model\Types;

use KassaCom\SDK\Exception\Validation\InvalidPropertyException;
use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Request\Item\PaymentMethodDataItem;

class PaymentMethodTokenMode extends AbstractCustomType
{
    /**
     * @inheritDoc
     */
    public function validate($field)
    {
        $tokenMode = $this->getValue($field);

        if (empty($tokenMode)) {
            return true;
        }

        $availablePaymentMethods = [
            PaymentMethodDataItem::TOKEN_MODE_PLAIN,
            PaymentMethodDataItem::TOKEN_MODE_ENCRYPTED,
        ];

        if (!in_array($tokenMode, $availablePaymentMethods, true)) {
            throw new InvalidPropertyException('Unsupportable token mode', 0, $field);
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
