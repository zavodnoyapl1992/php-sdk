<?php


namespace KassaCom\SDK\Transport\Authorization;


interface AuthorizationInterface
{
    /**
     * @return string
     */
    public function getAuthorizationHeader();
}
