<?php


namespace KassaCom\SDK\Model\Request\Refund;


use KassaCom\SDK\Model\Request\AbstractRequestSerializer;

class GetRefundSerializer extends AbstractRequestSerializer
{
    /**
     * @inheritDoc
     */
    public function getSerializedData()
    {
        /** @var GetRefundRequest $request */
        $request = $this->request;

        return [
            'token' => $request->getToken(),
        ];
    }
}
