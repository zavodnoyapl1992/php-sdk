<?php


namespace KassaCom\SDK\Exception\ServerResponse;


class TooManyRequestsException extends AbstractResponseException
{
    const HTTP_CODE = 429;

    /**
     * @inheritDoc
     */
    public function getHttpCode()
    {
        return self::HTTP_CODE;
    }
}
