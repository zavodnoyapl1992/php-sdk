<?php


namespace Tests\KassaCom\SDK;


use KassaCom\SDK\Exception\Notification\EmptyApiKeyException;
use KassaCom\SDK\Exception\Notification\IncorrectBodyRequestException;
use KassaCom\SDK\Exception\Notification\NotificationSecurityException;
use KassaCom\SDK\Model\Request\NotificationRequest;
use KassaCom\SDK\Model\Response\Item\ErrorDetailsItem;
use KassaCom\SDK\Model\Response\Item\OrderResponseItem;
use KassaCom\SDK\Model\Response\Item\WalletResponseItem;
use KassaCom\SDK\Notification;
use PHPUnit\Framework\TestCase;

class NotificationTest extends TestCase
{
    const API_KEY = 'LONGANDSECUREAPIKEY';

    static private $allowedIps = [
        '95.216.144.80',
        '95.216.143.141',
        '52.213.148.150',
        '34.252.2.182',
    ];

    /**
     * @dataProvider validRequestProvider
     *
     * @param string $body
     * @param string $signature
     * @param string $ip
     */
    public function testProcess($body, $signature, $ip)
    {
        $_SERVER['HTTP_X_KASSA_SIGNATURE'] = $signature;
        $_SERVER['REMOTE_ADDR'] = $ip;
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $mock = $this->getMock(Notification::class, ['getBody']);
        $mock
            ->method('getBody')
            ->will($this->returnValue($body));

        $mock->setApiKey(self::API_KEY);
        /** @var NotificationRequest $request */
        $request = $mock->process(false);

        $this->assertInstanceOf(Notification::class, $mock);
        $this->assertInstanceOf(NotificationRequest::class, $request);
        $body = json_decode($body, true);

        $this->assertEquals($body['id'], $request->getId());
        $this->assertEquals($body['token'], $request->getToken());
        $this->assertEquals($body['create_date'], $request->getCreateDate()->format('c'));
        $this->assertEquals($body['status'], $request->getStatus());
        $this->assertEquals($body['notification_type'], $request->getNotificationType());
        if (isset($body['status_description'])) {
            $this->assertEquals($body['status_description'], $request->getStatusDescription());
        }
        if (isset($body['error_details'])) {
            $this->assertInstanceOf(ErrorDetailsItem::class, $request->getErrorDetails());
            $this->assertEquals($body['error_details']['error'], $request->getErrorDetails()->getError());
            $this->assertEquals($body['error_details']['description'], $request->getErrorDetails()->getDescription());
        }
        $this->assertInstanceOf(OrderResponseItem::class, $request->getOrder());
        $this->assertInstanceOf(WalletResponseItem::class, $request->getWallet());
    }

    public function testAuthFail()
    {
        $this->setExpectedException(EmptyApiKeyException::class);
        $notification = new Notification();
        $notification->process(false);
    }

    /**
     * @dataProvider invalidSecurityRequestProvider
     *
     * @param string $body
     * @param string $signature
     * @param string $ip
     * @param string $method
     */
    public function testSecurityFail($body, $signature, $ip, $method)
    {
        $this->setExpectedException(NotificationSecurityException::class);

        $_SERVER['HTTP_X_KASSA_SIGNATURE'] = $signature;
        $_SERVER['REMOTE_ADDR'] = $ip;
        $_SERVER['REQUEST_METHOD'] = $method;

        $mock = $this->getMock(Notification::class, ['getBody']);
        $mock
            ->method('getBody')
            ->will($this->returnValue($body));

        $mock->setApiKey(self::API_KEY);
        $mock->process(false);
    }

    /**
     * @dataProvider invalidBodyProvider
     *
     * @param string $body
     */
    public function testInvalidRequest($body)
    {
        $this->setExpectedException(IncorrectBodyRequestException::class);

        $mock = $this->getMock(Notification::class, ['getBody', 'checkRequest']);

        $mock
            ->method('getBody')
            ->will($this->returnValue($body));
        $mock->setApiKey(self::API_KEY);
        $mock->process(false);
    }

    public function validRequestProvider()
    {
        $data = [];

        $requests = file_get_contents(__DIR__ . '/Fixtures/requestFixtures.json');
        $requests = json_decode($requests, true);

        foreach ($requests as $key => $request) {
            $request = json_encode($request);
            $data[] = [
                $request, hash('sha256', $request . self::API_KEY), self::$allowedIps[$key % count(self::$allowedIps)],
            ];
        }

        return $data;
    }

    public function invalidSecurityRequestProvider()
    {
        $requests = file_get_contents(__DIR__ . '/Fixtures/requestFixtures.json');
        $requests = json_decode($requests, true);

        return [
            [json_encode($requests[0]), hash('sha256', json_encode($requests[0]) . 'fail' . self::API_KEY), self::$allowedIps[0], 'post'],
            [json_encode($requests[1]), hash('sha256', json_encode($requests[1]) . self::API_KEY), self::$allowedIps[1], 'post1'],
            [json_encode($requests[2]), null, self::$allowedIps[2], 'post',],
            [json_encode($requests[3]), hash('sha256', json_encode($requests[3]) . self::API_KEY), 'qqqqqq', 'post'],
        ];
    }

    public function invalidBodyProvider()
    {
        return [
            [''],
            ['{"test"}'],
            ['"payment_method": {"type": "card","account": "420000xxxxxx0000"},'],
            ['qwertyuiop[];lkjhgfds'],
            [true],
            [false],
            [1111],
            [-1],
        ];
    }
}
