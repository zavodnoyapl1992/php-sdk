<?php

namespace KassaCom\SDK\Model\Response\Payment;

use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class ApplePayVerifyResponse extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /** @var array|null */
    private $appleResponse;

    /** @var string|null */
    private $error;

    /**
     * @return array|null
     */
    public function getAppleResponse()
    {
        return $this->appleResponse;
    }

    /**
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }

    public function isError()
    {
        return !empty($this->error);
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'apple_response' => AbstractResponse::TYPE_ARRAY,
            'error' => AbstractResponse::TYPE_STRING,
        ];
    }


    /**
     * @inheritDoc
     */
    public function getThoughOneField()
    {
        return [
            ['apple_response', 'error'],
        ];
    }
}
