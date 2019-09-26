<?php

namespace KassaCom\SDK\Model\Response\Item;

use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class CardItem extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /**
     * @var string|null
     */
    private $fingerprint;

    /**
     * @var string|null
     */
    private $category;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var string|null
     */
    private $bank;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var bool|null
     */
    private $is3ds;

    /**
     * @return string|null
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param string|null $fingerprint
     *
     * @return CardItem
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string|null $category
     *
     * @return CardItem
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     *
     * @return CardItem
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param string|null $bank
     *
     * @return CardItem
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return CardItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIs3ds()
    {
        return $this->is3ds;
    }

    /**
     * @param bool|null $is3ds
     *
     * @return CardItem
     */
    public function setIs3ds($is3ds)
    {
        $this->is3ds = $is3ds;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getRequiredFields()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getOptionalFields()
    {
        return [
            'fingerprint' => AbstractResponse::TYPE_STRING,
            'category' => AbstractResponse::TYPE_STRING,
            'country' => AbstractResponse::TYPE_STRING,
            'bank' => AbstractResponse::TYPE_STRING,
            'type' => AbstractResponse::TYPE_STRING,
            'is3ds' => AbstractResponse::TYPE_BOOLEAN,
        ];
    }
}
