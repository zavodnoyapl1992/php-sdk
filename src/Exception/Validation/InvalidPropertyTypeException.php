<?php


namespace KassaCom\SDK\Exception\Validation;


use KassaCom\SDK\Exception\Validation\Traits\PropertyExceptionTrait;

class InvalidPropertyTypeException extends \InvalidArgumentException
{
    use PropertyExceptionTrait;

    /**
     * @inheritDoc
     */
    public function __construct($message = '', $code = 0, $property = '', \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->property = $property;
    }
}
