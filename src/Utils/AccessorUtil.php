<?php


namespace KassaCom\SDK\Utils;


class AccessorUtil
{
    public static function property($text)
    {
        $text = strtolower($text);

        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $text))));
    }

    public static function getter($text)
    {
        return 'get' . ucfirst(self::property($text));
    }

    public static function isser($text)
    {
        return 'is' . ucfirst(self::property($text));
    }

    public static function adder($text)
    {
        return 'add' . ucfirst(self::property($text));
    }
}
