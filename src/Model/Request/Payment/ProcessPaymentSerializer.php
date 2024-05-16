<?php


namespace KassaCom\SDK\Model\Request\Payment;


use KassaCom\SDK\Model\PaymentMethods;
use KassaCom\SDK\Model\Request\AbstractRequestSerializer;

class ProcessPaymentSerializer extends AbstractRequestSerializer
{
    /**
     * @inheritDoc
     */
    public function getSerializedData()
    {
        /** @var ProcessPaymentRequest $processPaymentRequest */
        $processPaymentRequest = $this->request;
        $serializedData = [
            'token' => $processPaymentRequest->getToken(),
            'ip' => $processPaymentRequest->getIp(),
            'payment_method_data' => [],
        ];

        $paymentMethodDataItem = $processPaymentRequest->getPaymentMethodData();

        if ($paymentMethodDataItem) {
            $serializedData['payment_method_data']['type'] = $paymentMethodDataItem->getType();

            if ($paymentMethodDataItem->getType() === PaymentMethods::PAYMENT_METHOD_CARD) {
                $serializedData['payment_method_data']['card_number'] = $paymentMethodDataItem->getCardNumber();
                $serializedData['payment_method_data']['card_month'] = $paymentMethodDataItem->getCardMonth();
                $serializedData['payment_method_data']['card_year'] = $paymentMethodDataItem->getCardYear();
                $serializedData['payment_method_data']['card_security'] = $paymentMethodDataItem->getCardSecurity();
                $serializedData['payment_method_data']['cardholder'] = $paymentMethodDataItem->getCardholder();
            }

            if ($paymentMethodDataItem->getType() === PaymentMethods::PAYMENT_METHOD_WEBMONEY && $paymentMethodDataItem->getPurseType() !== null) {
                $serializedData['payment_method_data']['purse_type'] = $paymentMethodDataItem->getPurseType();
            }

            if ($paymentMethodDataItem->getType() === PaymentMethods::PAYMENT_METHOD_CARD_TOKENIZED) {
                $serializedData['payment_method_data']['token_data'] = $paymentMethodDataItem->getTokenData();
                $serializedData['payment_method_data']['token_type'] = $paymentMethodDataItem->getTokenType();
            }

            if ($paymentMethodDataItem->getType() === PaymentMethods::PAYMENT_METHOD_SBP && $paymentMethodDataItem->getReturnImage()) {
                $serializedData['payment_method_data']['return_image'] = $paymentMethodDataItem->getReturnImage();
            }

            if ($paymentMethodDataItem->getAccount() !== null) {
                $serializedData['payment_method_data']['account'] = $paymentMethodDataItem->getAccount();
            }

            if ($paymentMethodDataItem->getCapture() !== null) {
                $serializedData['payment_method_data']['capture'] = $paymentMethodDataItem->getCapture();
            }
        }

        $browserData = $processPaymentRequest->getBrowserData();

        if ($browserData) {
            $serializedData['browser_data']['browser_accept_header'] = $browserData->getBrowserAcceptHeader();
            $serializedData['browser_data']['browser_color_depth'] = $browserData->getBrowserColorDepth();
            $serializedData['browser_data']['browser_language'] = $browserData->getBrowserLanguage();
            $serializedData['browser_data']['browser_user_agent'] = $browserData->getBrowserUserAgent();
            $serializedData['browser_data']['browser_screen_height'] = $browserData->getBrowserScreenHeight();
            $serializedData['browser_data']['browser_screen_width'] = $browserData->getBrowserScreenWidth();
            $serializedData['browser_data']['browser_tz'] = $browserData->getBrowserTz();
            $serializedData['browser_data']['browser_tz_name'] = $browserData->getBrowserTzName();
            $serializedData['browser_data']['device_channel'] = $browserData->getDeviceChannel();
            $serializedData['browser_data']['browser_java_enabled'] = $browserData->getBrowserJavaEnabled();
            $serializedData['browser_data']['browser_java_script_enabled'] = $browserData->getBrowserJavaScriptEnabled();
            $serializedData['browser_data']['window_width'] = $browserData->getWindowWidth();
            $serializedData['browser_data']['window_height'] = $browserData->getWindowHeight();

            $serializedData['browser_data'] = array_filter($serializedData['browser_data'], function ($data) {
                return null !== $data;
            });
        }

        return $serializedData;
    }
}
