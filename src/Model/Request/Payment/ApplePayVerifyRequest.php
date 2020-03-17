<?php

namespace KassaCom\SDK\Model\Request\Payment;

use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class ApplePayVerifyRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $host;

    /**
     * string
     */
    private $validationUrl;

    /**
     * ApplePayVerifyRequest constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->token = isset($data['token']) ? $data['token'] : null;
        $this->host = isset($data['host']) ? $data['host'] : null;
        $this->validationUrl = isset($data['validationUrl']) ? $data['validationUrl'] : null;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getValidationUrl()
    {
        return $this->validationUrl;
    }

    /**
     * @param mixed|null $validationUrl
     *
     * @return $this
     */
    public function setValidationUrl($validationUrl)
    {
        $this->validationUrl = $validationUrl;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'token' => AbstractRequest::TYPE_STRING,
            'host' => AbstractRequest::TYPE_STRING,
            'validation_url' => AbstractRequest::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [];
    }
}
