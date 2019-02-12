<?php


namespace KassaCom\SDK\Model\Request\Item;


use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class RefundReceiptRequestItem extends AbstractRequestItem implements \JsonSerializable
{
    use RecursiveRestoreTrait;

    /**
     * @var array|ItemsReceiptRequestItem[]
     */
    private $items;

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
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'items' => [ItemsReceiptRequestItem::class],
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        $receiptItems = [];

        foreach ($this->getItems() as $item) {
            $receiptItems[] = $item->jsonSerialize();
        }

        return [
            'items' => $receiptItems,
        ];
    }
}
