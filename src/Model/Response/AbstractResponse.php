<?php

namespace KassaCom\SDK\Model\Response;


use KassaCom\SDK\Model\Interfaces\RestorableInterface;

abstract class AbstractResponse implements RestorableInterface
{
    /**
     * @inheritDoc
     */
    public function getThoughOneField()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return var_export($this, true);
    }
}
