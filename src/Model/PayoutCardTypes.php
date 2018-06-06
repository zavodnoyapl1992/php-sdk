<?php


namespace KassaCom\SDK\Model;


final class PayoutCardTypes
{
    const CARD_TYPE_CARD_RU = 'card_ru';

    const CARD_TYPE_CARD_WORLD = 'card_world';

    /**
     * @return array
     */
    public static function getAvailableCardTypes()
    {
        return [
            self::CARD_TYPE_CARD_RU,
            self::CARD_TYPE_CARD_WORLD,
        ];
    }
}
