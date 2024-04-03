<?php

namespace KassaCom\SDK\Model\Response\Item;

use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class SbpMemberItem extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /** @var string */
    private $memberId;

    /** @var string */
    private $nameRus;

    /** @var string */
    private $name;

    /** @var string */
    private $bik;

    /**
     * @return string
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * @param string $memberId
     *
     * @return $this
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameRus()
    {
        return $this->nameRus;
    }

    /**
     * @param string $nameRus
     *
     * @return $this
     */
    public function setNameRus($nameRus)
    {
        $this->nameRus = $nameRus;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getBik()
    {
        return $this->bik;
    }

    /**
     * @param string $bik
     */
    public function setBik($bik)
    {
        $this->bik = $bik;
    }

    public function getRequiredFields()
    {
        return [
            'member_id' => self::TYPE_STRING,
            'name_rus' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
        ];
    }

    public function getOptionalFields()
    {
        return [
            'bik' => self::TYPE_STRING,
        ];
    }
}
