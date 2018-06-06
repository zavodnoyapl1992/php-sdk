<?php


namespace KassaCom\SDK\Model\Request\Payment;


use KassaCom\SDK\Model\Request\AbstractRequestSerializer;

class CancelPaymentSerializer extends AbstractRequestSerializer
{
    /**
     * @inheritDoc
     */
    public function getSerializedData()
    {
        /** @var CancelPaymentRequest $cancelPaymentRequest */
        $cancelPaymentRequest = $this->request;
        $serializedData = [
            'token' => $cancelPaymentRequest->getToken(),
        ];

        if ($cancelPaymentRequest->getReason()) {
            $serializedData['reason'] = $cancelPaymentRequest->getReason();
        }

        return $serializedData;
    }
}
