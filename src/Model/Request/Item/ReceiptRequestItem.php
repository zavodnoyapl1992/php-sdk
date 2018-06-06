<?php


namespace KassaCom\SDK\Model\Request\Item;


use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class ReceiptRequestItem extends AbstractRequestItem
{
    use RecursiveRestoreTrait;

    /**
     * @var array|ItemsReceiptRequestItem[]
     */
    private $items;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $place;

    /**
     * ReceiptRequestItem constructor.
     */
    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @return array|ItemsReceiptRequestItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array|ItemsReceiptRequestItem[] $items
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param ItemsReceiptRequestItem $item
     *
     * @return $this
     */
    public function addItem(ItemsReceiptRequestItem $item)
    {
        if (!in_array($item, $this->items)) {
            $this->items[] = $item;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     *
     * @return $this
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'items' => [ItemsReceiptRequestItem::class],
            'place' => self::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'email' => self::TYPE_STRING,
            'phone' => self::TYPE_STRING,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getThoughOneField()
    {
        return [
            ['email', 'phone'],
        ];
    }
}
