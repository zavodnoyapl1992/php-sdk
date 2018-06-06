<?php


namespace KassaCom\SDK\Model\Response\Item;


class WalletPayoutResponseItem extends WalletResponseItem
{
    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'id' => self::TYPE_INTEGER,
            'amount' => self::TYPE_FLOAT,
            'currency' => self::TYPE_STRING,
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
