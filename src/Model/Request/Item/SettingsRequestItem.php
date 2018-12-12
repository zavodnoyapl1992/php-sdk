<?php

namespace KassaCom\SDK\Model\Request\Item;


use KassaCom\SDK\Model\PaymentMethods;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\LocaleType;
use KassaCom\SDK\Model\Types\PaymentType;

class SettingsRequestItem extends AbstractRequestItem
{
    const LOCALE_RU = 'ru';
    const LOCALE_EN = 'en';

    use RecursiveRestoreTrait;

    /**
     * @var integer
     */
    private $projectId;
    /**
     * @var string
     */
    private $paymentMethod;
    /**
     * @var string
     */
    private $successUrl;
    /**
     * @var string
     */
    private $failUrl;
    /**
     * @var string
     */
    private $locale = 'ru';

    /**
     * @var \DateTime
     */
    private $expireDate;

    /**
     * @var int
     */
    private $walletId;

    /**
     * @var boolean
     */
    private $isTest = false;

    /**
     * @var bool
     */
    private $hideFormHeader = false;

    /**
     * @var bool
     */
    private $hideFormMethods = false;

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     *
     * @return SettingsRequestItem
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * @return string
     * @see PaymentMethods
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     *
     * @return SettingsRequestItem
     * @see PaymentMethods
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    /**
     * @param string $successUrl
     *
     * @return SettingsRequestItem
     */
    public function setSuccessUrl($successUrl)
    {
        $this->successUrl = $successUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailUrl()
    {
        return $this->failUrl;
    }

    /**
     * @param string $failUrl
     *
     * @return SettingsRequestItem
     */
    public function setFailUrl($failUrl)
    {
        $this->failUrl = $failUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     *
     * @return SettingsRequestItem
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param \DateTime $expireDate
     *
     * @return $this
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * @param int $walletId
     *
     * @return $this
     */
    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsTest()
    {
        return $this->isTest;
    }

    /**
     * @param bool $isTest
     *
     * @return $this
     */
    public function setIsTest($isTest)
    {
        $this->isTest = $isTest;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'project_id' => self::TYPE_INTEGER,
        ];
    }

    /**
     * @return bool
     */
    public function isHideFormHeader()
    {
        return $this->hideFormHeader;
    }

    /**
     * @param bool $hideFormHeader
     *
     * @return $this
     */
    public function setHideFormHeader($hideFormHeader)
    {
        $this->hideFormHeader = $hideFormHeader;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHideFormMethods()
    {
        return $this->hideFormMethods;
    }

    /**
     * @param bool $hideFormMethods
     *
     * @return $this
     */
    public function setHideFormMethods($hideFormMethods)
    {
        $this->hideFormMethods = $hideFormMethods;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'payment_method' => new PaymentType($this),
            'success_url' => self::TYPE_STRING,
            'fail_url' => self::TYPE_STRING,
            'expire_date' => self::TYPE_DATE,
            'wallet_id' => self::TYPE_INTEGER,
            'is_test' => self::TYPE_BOOLEAN,
            'hide_form_header' => self::TYPE_BOOLEAN,
            'hide_form_methods' => self::TYPE_BOOLEAN,
            'locale' => new LocaleType($this),
        ];
    }
}
