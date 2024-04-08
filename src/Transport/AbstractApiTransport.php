<?php

namespace KassaCom\SDK\Transport;


use GuzzleHttp\Psr7;
use KassaCom\SDK\Client;
use KassaCom\SDK\Exception\TransportException;
use KassaCom\SDK\Transport\Authorization\AuthorizationInterface;
use KassaCom\SDK\Utils\LogCleaner;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractApiTransport implements LoggerAwareInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    /**
     * Domain
     *
     * @var string
     */
    protected $apiUrl = 'https://api.kassa.com/v1';

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var AuthorizationInterface
     */
    protected $authorization;

    /**
     * @var string[]
     */
    protected $defaultHeaders;

    protected $cleanerFieldMapper = [];
    protected $loggingHeaders = false;

    /**
     * AbstractApiTransport constructor.
     */
    public function __construct()
    {
        $this->defaultHeaders = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'User-Agent' => 'Kassa.com PHP SDK v' . Client::VERSION,
            'X-Client-Name' => 'PHP SDK',
            'X-Client-Version' => Client::VERSION,
        ];
    }

    /**
     * @param Psr7\Request $request
     *
     * @return Psr7\Response
     */
    abstract protected function sendRequest(Psr7\Request $request);

    /**
     * @param string $path        Название метода из api
     * @param string $method      GET или POST
     * @param array  $queryParams GET параметры
     * @param mixed  $body
     * @param array  $headers
     *
     * @return Psr7\Response
     * @throws TransportException
     */
    public function send($path, $method, $queryParams = [], $requestBody = null, $requestHeaders = [])
    {
        $uri = rtrim($this->apiUrl, '/') . '/' . ltrim($path, '/');

        if (is_array($queryParams) && count($queryParams)) {
            $uri .= '?' . http_build_query($queryParams);
        }

        if (!$this->authorization) {
            throw new TransportException('Please provide authorization data');
        }

        $requestHeaders = array_replace($this->defaultHeaders, $requestHeaders);

        if ($method == self::METHOD_GET) {
            $requestBody = null;
        }

        $requestHeaders['Authorization'] = $this->authorization->getAuthorizationHeader();

        $request = new Psr7\Request(
            $method,
            $uri,
            $requestHeaders,
            $requestBody
        );

        $response = $this->sendRequest($request);
        $responseCode = $response->getStatusCode();
        $responseHeaders = $response->getHeaders();
        $responseBody = $response->getBody();

        if ($responseBody) {
            $responseBody = $responseBody->getContents();
        } else {
            $responseBody = null;
        }

        if ($this->logger) {
            $loggableRequestBody = empty($requestBody) ? $requestBody : json_decode($requestBody, true);
            $loggableResponseBody = empty($responseBody) ? $responseBody : json_decode($responseBody, true);
            $loggableRequestBody = json_encode($this->clearLoggableData($loggableRequestBody), JSON_UNESCAPED_UNICODE);
            $loggableResponseBody = json_encode($this->clearLoggableData($loggableResponseBody), JSON_UNESCAPED_UNICODE);

            if ($this->isLoggingHeaders()) {
                $loggableRequestHeaders = json_encode($this->clearLoggableData($requestHeaders), JSON_UNESCAPED_UNICODE);
                $loggableResponseHeaders = json_encode($this->clearLoggableData($responseHeaders), JSON_UNESCAPED_UNICODE);
            } else {
                $loggableRequestHeaders = 'skipped';
                $loggableResponseHeaders = 'skipped';
            }

            $this->logger->info(
                sprintf(
                    'Request %s %s body: %s headers: %s; Response %s body: %s headers: %s',
                    $method,
                    $uri,
                    $loggableRequestBody,
                    $loggableRequestHeaders,
                    $responseCode,
                    $loggableResponseBody,
                    $loggableResponseHeaders
                )
            );
        }

        return new Psr7\Response($responseCode, $responseHeaders, $responseBody);
    }

    /**
     * @param string $apiUrl
     *
     * @return AbstractApiTransport
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param AuthorizationInterface $authorization
     */
    public function setAuth(AuthorizationInterface $authorization)
    {
        $this->authorization = $authorization;
    }

    protected function clearLoggableData($loggableArray)
    {
        if (!is_array($loggableArray)) {
            return $loggableArray;
        }

        $cleaner = LogCleaner::getCleaner();

        $cleaner
            ->addFieldMapper(['authorization'], 'auth')
            ->addFieldMapper(['card_number'], LogCleaner::getCallbackForPan())
            ->addFieldMapper(['card_month'], 'month')
            ->addFieldMapper(['card_year'], 'year')
            ->addFieldMapper(['card_security'], 'cvv')
            ->addFieldMapper(['cardholder'], 'cardholder')
            ->addFieldMapper(['token_data'], 'token')
            ->addFieldMapper(['pareq'], 'pareq')
            ->addFieldMapper(['pares'], 'pares')
            ->addFieldMapper(['creq'], 'creq')
            ->addFieldMapper(['cres'], 'cres')
            ->addFieldMapper(['cavv'], 'cavv')
            ->addFieldMapper(['xid'], 'xid')
            ->addFieldMapper(['eci'], 'eci');

        foreach ($this->cleanerFieldMapper as $mapper) {
            $cleaner->addFieldMapper($mapper['fields'], $mapper['mapper']);
        }

        return $cleaner->clearLoggableData($loggableArray);
    }

    public function isLoggingHeaders()
    {
        return $this->loggingHeaders;
    }

    /**
     * @param bool $loggingHeaders
     */
    public function setLoggingHeaders($loggingHeaders)
    {
        $this->loggingHeaders = $loggingHeaders;
    }

    public function getCleanerFieldMapper()
    {
        return $this->cleanerFieldMapper;
    }

    /**
     * @param array $fieldMapper
     * @param string $filtered
     */
    public function addCleanerFieldMapper(array $fields, $mapper)
    {
        $this->cleanerFieldMapper[] = [
            'fields' => $fields,
            'mapper' => $mapper,
        ];
    }
}
