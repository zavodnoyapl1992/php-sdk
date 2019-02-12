<?php


namespace KassaCom\SDK\Model\Request\Subscription;


use KassaCom\SDK\Model\Request\AbstractRequestSerializer;

class GetSubscriptionSerializer extends AbstractRequestSerializer
{
    public function getSerializedData()
    {
        /** @var GetSubscriptionRequest $request */
        $request = $this->request;

        return [
            'token' => $request->getToken(),
        ];
    }
}
