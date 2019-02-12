<?php


namespace KassaCom\SDK\Model\Request\Subscription;


use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class GetSubscriptionRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $token;

    /**
     * CreateSubscriptionRequest constructor.
     *
     * @param string|null $token
     */
    public function __construct($token = null)
    {
        if (!is_null($token)) {
            $this->token = $token;
        }
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

    public function getRequiredFields()
    {
        return [
            'token' => self::TYPE_STRING,
        ];
    }

    public function getOptionalFields()
    {
        return [];
    }
}
