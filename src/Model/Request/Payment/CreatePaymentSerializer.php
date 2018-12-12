<?php


namespace KassaCom\SDK\Model\Request\Payment;


use KassaCom\SDK\Model\Request\AbstractRequestSerializer;
use KassaCom\SDK\Model\Request\Item\ReceiptRequestItem;

class CreatePaymentSerializer extends AbstractRequestSerializer
{
    /**
     * @inheritDoc
     */
    public function getSerializedData()
    {
        /** @var CreatePaymentRequest $paymentRequest */
        $paymentRequest = $this->request;
        $order = $paymentRequest->getOrder();
        $settings = $paymentRequest->getSettings();
        $customParameters = $paymentRequest->getCustomParameters();
        $receipt = $paymentRequest->getReceipt();
        $serializedCreatePayment = [];

        $emptyFilter = function ($param) {
            return !empty($param);
        };

        $serializedCreatePayment['order'] = [
            'currency' => $order->getCurrency(),
            'amount' => $order->getAmount(),
            'description' => $order->getDescription(),
        ];

        $serializedCreatePayment['order'] = array_filter($serializedCreatePayment['order'], $emptyFilter);

        $serializedCreatePayment['settings'] = [
            'project_id' => $settings->getProjectId(),
            'payment_method' => $settings->getPaymentMethod(),
            'success_url' => $settings->getSuccessUrl(),
            'fail_url' => $settings->getFailUrl(),
            'locale' => $settings->getLocale(),
            'expire_date' => $settings->getExpireDate() ? $settings->getExpireDate()->format('c') : null,
            'wallet_id' => $settings->getWalletId(),
            'is_test' => $settings->getIsTest(),
            'hide_form_header' => $settings->isHideFormHeader(),
            'hide_form_methods' => $settings->isHideFormMethods() ,
        ];

        $serializedCreatePayment['settings'] = array_filter($serializedCreatePayment['settings'], $emptyFilter);

        if (!empty($customParameters)) {
            $serializedCreatePayment['custom_parameters'] = $customParameters;
            $serializedCreatePayment['custom_parameters'] = array_filter($serializedCreatePayment['custom_parameters'], $emptyFilter);
        }

        if ($receipt instanceof ReceiptRequestItem) {
            $receiptItems = [];

            foreach ($receipt->getItems() as $item) {
                $itemData = [
                    'name' => $item->getName(),
                    'price' => $item->getPrice(),
                    'quantity' => $item->getQuantity(),
                    'tax' => $item->getTax(),
                    'sum' => $item->getSum(),
                ];

                $itemData = array_filter($itemData, $emptyFilter);
                $receiptItems[] = $itemData;
            }

            $serializedCreatePayment['receipt'] = [
                'items' => $receiptItems,
                'email' => $receipt->getEmail(),
                'phone' => $receipt->getPhone(),
                'place' => $receipt->getPlace(),
            ];

            $serializedCreatePayment['receipt'] = array_filter($serializedCreatePayment['receipt'], $emptyFilter);
        }

        return $serializedCreatePayment;
    }
}
