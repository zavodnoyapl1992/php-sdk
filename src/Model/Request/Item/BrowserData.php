<?php

namespace KassaCom\SDK\Model\Request\Item;

use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class BrowserData extends AbstractRequestItem
{
    use RecursiveRestoreTrait;

    /**
     * @var string|null
     */
    protected $browserAcceptHeader;

    /**
     * @var string|null
     */
    protected $browserColorDepth;

    /**
     * @var string|null
     */
    protected $browserLanguage;

    /**
     * @var string|null
     */
    protected $browserUserAgent;

    /**
     * @var string|null
     */
    protected $browserScreenHeight;

    /**
     * @var string|null
     */
    protected $browserScreenWidth;

    /**
     * @var string|null
     */
    protected $browserTz;

    /**
     * @var string|null
     */
    protected $browserTzName;

    /**
     * @var string|null
     */
    protected $deviceChannel;

    /**
     * @var string|null
     */
    protected $browserJavaEnabled;

    /**
     * @var string|null
     */
    protected $browserJavaScriptEnabled;

    /**
     * @var string|null
     */
    protected $windowWidth;

    /**
     * @var string|null
     */
    protected $windowHeight;

    /**
     * @return string|null
     */
    public function getBrowserAcceptHeader()
    {
        return $this->browserAcceptHeader;
    }

    /**
     * @param string|null $browserAcceptHeader
     *
     * @return $this
     */
    public function setBrowserAcceptHeader($browserAcceptHeader)
    {
        $this->browserAcceptHeader = $browserAcceptHeader;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserColorDepth()
    {
        return $this->browserColorDepth;
    }

    /**
     * @param string|null $browserColorDepth
     *
     * @return $this
     */
    public function setBrowserColorDepth($browserColorDepth)
    {
        $this->browserColorDepth = $browserColorDepth;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserLanguage()
    {
        return $this->browserLanguage;
    }

    /**
     * @param string|null $browserLanguage
     *
     * @return $this
     */
    public function setBrowserLanguage($browserLanguage)
    {
        $this->browserLanguage = $browserLanguage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserUserAgent()
    {
        return $this->browserUserAgent;
    }

    /**
     * @param string|null $browserUserAgent
     *
     * @return $this
     */
    public function setBrowserUserAgent($browserUserAgent)
    {
        $this->browserUserAgent = $browserUserAgent;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserScreenHeight()
    {
        return $this->browserScreenHeight;
    }

    /**
     * @param string|null $browserScreenHeight
     *
     * @return $this
     */
    public function setBrowserScreenHeight($browserScreenHeight)
    {
        $this->browserScreenHeight = $browserScreenHeight;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserScreenWidth()
    {
        return $this->browserScreenWidth;
    }

    /**
     * @param string|null $browserScreenWidth
     *
     * @return $this
     */
    public function setBrowserScreenWidth($browserScreenWidth)
    {
        $this->browserScreenWidth = $browserScreenWidth;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserTz()
    {
        return $this->browserTz;
    }

    /**
     * @param string|null $browserTz
     *
     * @return $this
     */
    public function setBrowserTz($browserTz)
    {
        $this->browserTz = $browserTz;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserTzName()
    {
        return $this->browserTzName;
    }

    /**
     * @param string|null $browserTzName
     *
     * @return $this
     */
    public function setBrowserTzName($browserTzName)
    {
        $this->browserTzName = $browserTzName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeviceChannel()
    {
        return $this->deviceChannel;
    }

    /**
     * @param string|null $deviceChannel
     *
     * @return $this
     */
    public function setDeviceChannel($deviceChannel)
    {
        $this->deviceChannel = $deviceChannel;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserJavaEnabled()
    {
        return $this->browserJavaEnabled;
    }

    /**
     * @param string|null $browserJavaEnabled
     *
     * @return $this
     */
    public function setBrowserJavaEnabled($browserJavaEnabled)
    {
        $this->browserJavaEnabled = $browserJavaEnabled;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserJavaScriptEnabled()
    {
        return $this->browserJavaScriptEnabled;
    }

    /**
     * @param string|null $browserJavaScriptEnabled
     *
     * @return $this
     */
    public function setBrowserJavaScriptEnabled($browserJavaScriptEnabled)
    {
        $this->browserJavaScriptEnabled = $browserJavaScriptEnabled;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWindowWidth()
    {
        return $this->windowWidth;
    }

    /**
     * @param string|null $windowWidth
     *
     * @return $this
     */
    public function setWindowWidth($windowWidth)
    {
        $this->windowWidth = $windowWidth;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWindowHeight()
    {
        return $this->windowHeight;
    }

    /**
     * @param string|null $windowHeight
     *
     * @return $this
     */
    public function setWindowHeight($windowHeight)
    {
        $this->windowHeight = $windowHeight;

        return $this;
    }

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
            'browser_accept_header' => self::TYPE_STRING,
            'browser_color_depth' => self::TYPE_STRING,
            'browser_language' => self::TYPE_STRING,
            'browser_user_agent' => self::TYPE_STRING,
            'browser_screen_height' => self::TYPE_STRING,
            'browser_screen_width' => self::TYPE_STRING,
            'browser_tz' => self::TYPE_STRING,
            'browser_tz_name' => self::TYPE_STRING,
            'device_channel' => self::TYPE_STRING,
            'browser_java_enabled' => self::TYPE_BOOLEAN,
            'browser_java_script_enabled' => self::TYPE_BOOLEAN,
            'window_width' => self::TYPE_STRING,
            'window_height' => self::TYPE_STRING,
        ];
    }
}
