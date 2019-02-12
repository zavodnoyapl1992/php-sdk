<?php


namespace KassaCom\SDK\Model\Request\Refund;


use KassaCom\SDK\Model\Request\AbstractRequestSerializer;
use KassaCom\SDK\Model\Request\Item\RefundReceiptRequestItem;

class CreateRefundSerializer extends AbstractRequestSerializer
{
    /**
     * @inheritDoc
     */
    public function getSerializedData()
    {
        /** @var CreateRefundRequest $request */
        $request = $this->request;
        $receipt = $request->getReceipt();

        $serializedData = [
            'token' => $request->getToken(),
            'refund' => $request->getRefund()->jsonSerialize(),
        ];

        if ($receipt instanceof RefundReceiptRequestItem) {
            $serializedData['receipt'] = $receipt->jsonSerialize();
        }

        return $serializedData;
    }
}
