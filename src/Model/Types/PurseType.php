<?php


namespace KassaCom\SDK\Model\Types;


use KassaCom\SDK\Exception\Validation\InvalidPropertyException;
use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Request\Item\PaymentMethodDataItem;

class PurseType extends AbstractCustomType
{
    /**
     * @inheritDoc
     */
    public function validate($field)
    {
        $value = $this->getValue($field);

        $availablePurseType = [
            PaymentMethodDataItem::WEBMONEY_WALLET_PURSE_P,
            PaymentMethodDataItem::WEBMONEY_WALLET_PURSE_R,
            PaymentMethodDataItem::WEBMONEY_WALLET_PURSE_Z,
            PaymentMethodDataItem::WEBMONEY_WALLET_PURSE_E,
            PaymentMethodDataItem::WEBMONEY_WALLET_PURSE_U,
            PaymentMethodDataItem::WEBMONEY_WALLET_PURSE_B,
        ];

        if (!in_array($value, $availablePurseType, true)) {
            $message = sprintf('Unsupportable purse type: %s. Expected one of %s', $value, join(', ', $availablePurseType));
            throw new InvalidPropertyException($message, 0, $field);
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
