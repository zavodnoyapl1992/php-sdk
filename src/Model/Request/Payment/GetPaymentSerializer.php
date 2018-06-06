<?php


namespace KassaCom\SDK\Model\Request\Payment;


use KassaCom\SDK\Model\Request\AbstractRequestSerializer;

class GetPaymentSerializer extends AbstractRequestSerializer
{
    /**
     * @inheritDoc
     */
    public function getSerializedData()
    {
        /** @var GetPaymentRequest $getPaymentRequest */
        $getPaymentRequest = $this->request;

        return [
            'token' => $getPaymentRequest->getToken(),
        ];
    }
}
