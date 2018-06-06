<?php

namespace KassaCom\SDK\Exception\Validation\Traits;

trait PropertyExceptionTrait
{
    /**
     * @var string
     */
    private $property;

    /**
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }
}
