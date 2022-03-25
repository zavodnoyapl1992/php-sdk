<?php


namespace KassaCom\SDK\Model;


class NotificationTypes
{
    /** @var string Начало проведения платежа (статус PROCESS, после вводы данных на форме) */
    const TYPE_CHECK = 'check';

    /** @var string Успешно списание (статус SUCCESS) */
    const TYPE_PAY = 'pay';

    /** @var string Отмена платежа (статус CANCELED) */
    const TYPE_CANCEL = 'cancel';

    /** @var string Ошибка платежа (статус ERROR) */
    const TYPE_ERROR = 'error';

    /** @var string Возврат платежа (статус REFUND) */
    const TYPE_REFUND = 'refund';

    /** @var string Платеж ожидает подтверждение или отмену (статус WAIT_CAPTURE) */
    const TYPE_WAIT_CAPTURE = 'wait_capture';

    /**
     * @return array
     */
    public static function getAvailableTypes()
    {
        return [
            self::TYPE_CHECK,
            self::TYPE_PAY,
            self::TYPE_CANCEL,
            self::TYPE_ERROR,
            self::TYPE_REFUND,
            self::TYPE_WAIT_CAPTURE,
        ];
    }
}
