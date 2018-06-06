<?php

namespace Tests\KassaCom\SDK\Actions;

use KassaCom\SDK\Actions\RequestCreator;
use KassaCom\SDK\Exception\Request\RequestParseException;
use KassaCom\SDK\Exception\Request\UnknownRequestTypeException;
use KassaCom\SDK\Exception\Request\UnsupportedRequestTypeException;
use KassaCom\SDK\Model\PaymentMethods;
use KassaCom\SDK\Model\Request\Item\ItemsReceiptRequestItem;
use KassaCom\SDK\Model\Request\Item\OrderRequestItem;
use KassaCom\SDK\Model\Request\Item\PaymentMethodDataItem;
use KassaCom\SDK\Model\Request\Item\ReceiptRequestItem;
use KassaCom\SDK\Model\Request\Item\SettingsRequestItem;
use KassaCom\SDK\Model\Request\Payment\CreatePaymentRequest;
use KassaCom\SDK\Model\Request\Payment\ProcessPaymentRequest;
use PHPUnit\Framework\TestCase;
use Tests\KassaCom\SDK\Mocks\CreatePaymentRequestMock;
use Tests\KassaCom\SDK\Mocks\ProcessPaymentRequestMock;

class RequestCreatorTest extends TestCase
{
    public function testCreateUnknownRequestTypeException()
    {
        $this->setExpectedException(UnknownRequestTypeException::class);
        RequestCreator::create('UnknownRequestType', []);
    }

    public function testCreateUnsupportedRequestTypeException()
    {
        $this->setExpectedException(UnsupportedRequestTypeException::class);
        RequestCreator::create(__CLASS__, []);
    }

    public function testCreateRequestParseException()
    {
        $this->setExpectedException(RequestParseException::class);
        RequestCreator::create(CreatePaymentRequest::class, ['order' => 'invalid value']);
    }

    public function testCreatePaymentRequest()
    {
        $allFields = CreatePaymentRequestMock::getAllFields();

        foreach ($allFields as $paymentRequestMock) {
            $this->createAndCheckCreatePaymentRequest($paymentRequestMock);
        }
    }

    public function testProcessPaymentRequest()
    {
        $validFields = ProcessPaymentRequestMock::getValidFields();

        foreach ($validFields as $paymentRequestMock) {
            $this->createAndCheckProcessPaymentRequest($paymentRequestMock);
        }
    }

    public function testProcessPaymentRequestNotAllFields()
    {
        $nonRequiredFields = ProcessPaymentRequestMock::getNonRequiredFields();

        foreach ($nonRequiredFields as $nonRequiredField) {
            $paymentRequest = RequestCreator::create(ProcessPaymentRequest::class, $nonRequiredField);
            $this->assertInstanceOf(ProcessPaymentRequest::class, $paymentRequest);
        }
    }

    /**
     * @param array $data
     */
    protected function createAndCheckProcessPaymentRequest(array $data)
    {
        /** @var ProcessPaymentRequest $paymentRequest */
        $paymentRequest = RequestCreator::create(ProcessPaymentRequest::class, $data);

        $this->assertInstanceOf(ProcessPaymentRequest::class, $paymentRequest);
        $this->assertEquals($data['token'], $paymentRequest->getToken());
        $this->assertEquals($data['ip'], $paymentRequest->getIp());
        $paymentMethodData = $paymentRequest->getPaymentMethodData();
        $this->assertInstanceOf(PaymentMethodDataItem::class, $paymentMethodData);
        $this->assertEquals($data['payment_method_data']['type'], $paymentMethodData->getType());

        if ($paymentMethodData->getType() === PaymentMethods::PAYMENT_METHOD_CARD) {
            $this->assertEquals($data['payment_method_data']['card_number'], $paymentMethodData->getCardNumber());
            $this->assertEquals($data['payment_method_data']['card_month'], $paymentMethodData->getCardMonth());
            $this->assertEquals($data['payment_method_data']['card_year'], $paymentMethodData->getCardYear());
            $this->assertEquals($data['payment_method_data']['card_security'], $paymentMethodData->getCardSecurity());
            $this->assertNull($paymentMethodData->getAccount());
        } else if ($paymentMethodData->getType() === PaymentMethods::PAYMENT_METHOD_QIWI) {
            $this->assertNull($paymentMethodData->getCardNumber());
            $this->assertNull($paymentMethodData->getCardMonth());
            $this->assertNull($paymentMethodData->getCardYear());
            $this->assertNull($paymentMethodData->getCardSecurity());
            $this->assertEquals($data['payment_method_data']['account'], $paymentMethodData->getAccount());
        }
    }

    /**
     * @param array $data
     */
    private function createAndCheckCreatePaymentRequest($data)
    {
        /** @var CreatePaymentRequest $paymentRequest */
        $paymentRequest = RequestCreator::create(CreatePaymentRequest::class, $data);

        $this->assertInstanceOf(CreatePaymentRequest::class, $paymentRequest);

        $customParameters = $paymentRequest->getCustomParameters();

        foreach ($data['custom_parameters'] as $key => $param) {
            $this->assertArrayHasKey($key, $customParameters);
            $this->assertEquals($param, $customParameters[$key]);
        }

        $order = $paymentRequest->getOrder();
        $this->assertInstanceOf(OrderRequestItem::class, $order);
        $this->assertEquals($data['order']['currency'], $order->getCurrency());
        $this->assertEquals($data['order']['amount'], $order->getAmount());
        $this->assertEquals($data['order']['description'], $order->getDescription());


        $settings = $paymentRequest->getSettings();
        $this->assertInstanceOf(SettingsRequestItem::class, $settings);
        $this->assertEquals($data['settings']['project_id'], $settings->getProjectId());
        $this->assertEquals($data['settings']['payment_method'], $settings->getPaymentMethod());
        $this->assertEquals($data['settings']['success_url'], $settings->getSuccessUrl());
        $this->assertEquals($data['settings']['fail_url'], $settings->getFailUrl());
        $this->assertEquals($data['settings']['expire_date'], $settings->getExpireDate()->format('c'));
        $this->assertEquals($data['settings']['wallet_id'], $settings->getWalletId());

        $receipt = $paymentRequest->getReceipt();
        $this->assertInstanceOf(ReceiptRequestItem::class, $receipt);
        $this->assertEquals($data['receipt']['place'], $receipt->getPlace());
        $this->assertEquals($data['receipt']['email'], $receipt->getEmail());
        $this->assertEquals($data['receipt']['phone'], $receipt->getPhone());


        foreach ($receipt->getItems() as $i => $item) {
            $this->assertInstanceOf(ItemsReceiptRequestItem::class, $item);
            $this->assertEquals($data['receipt']['items'][$i]['name'], $item->getName());
            $this->assertEquals($data['receipt']['items'][$i]['price'], $item->getPrice());
            $this->assertEquals($data['receipt']['items'][$i]['quantity'], $item->getQuantity());
            $this->assertEquals($data['receipt']['items'][$i]['tax'], $item->getTax());
        }
    }
}
