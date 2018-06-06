<?php


namespace KassaCom\SDK\Model\Types;


use KassaCom\SDK\Exception\Validation\InvalidPropertyException;
use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Request\Item\SettingsRequestItem;

class LocaleType extends AbstractCustomType
{
    /**
     * @inheritDoc
     */
    public function validate($field)
    {
        $locale = $this->getValue($field);

        if (!in_array($locale, [SettingsRequestItem::LOCALE_EN, SettingsRequestItem::LOCALE_RU], true)) {
            throw new InvalidPropertyException('Unsupportable locale', 0, $field);
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
