<?php

namespace KassaCom\SDK\Utils;

class CardUtils
{
    const MIN_PAN_LENGTH = 10;
    const PAN_MASK_SYMBOL = 'x';

    public static function maskPan($pan)
    {
        if (strpos((string)$pan, 'xxxxxx') !== false) {
            return $pan; // Already masked
        }

        $pan = preg_replace('/[^\d]/', '', $pan ?: '');

        if (strlen($pan) < self::MIN_PAN_LENGTH) {
            return $pan; // This is not pan!
        }

        return substr($pan, 0, 6) . str_repeat(self::PAN_MASK_SYMBOL, 6) . substr($pan, -4);
    }
}
