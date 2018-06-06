<?php


namespace KassaCom\SDK\Model\Request\Payout;


use KassaCom\SDK\Model\Request\AbstractRequestSerializer;

class GetPayoutSerializer extends AbstractRequestSerializer
{
    /**
     * @inheritDoc
     */
    public function getSerializedData()
    {
        $payout = $this->request;
        $serializedData = [];

        if ($payout instanceof GetPayoutRequest) {
            $serializedData['transaction_id'] = $payout->getTransactionId();

            if ($payout->getWalletId()) {
                $serializedData['wallet_id'] = $payout->getWalletId();
            }
        } else if ($payout instanceof GetPayoutRequestById) {
            $serializedData['id'] = $payout->getId();
        }

        return $serializedData;
    }
}
