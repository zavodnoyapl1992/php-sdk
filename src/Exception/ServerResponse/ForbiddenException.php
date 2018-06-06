<?php


namespace KassaCom\SDK\Exception\ServerResponse;


class ForbiddenException extends AbstractResponseException
{
    const HTTP_CODE = 403;

    /**
     * @inheritDoc
     */
    public function getHttpCode()
    {
        return self::HTTP_CODE;
    }
}
